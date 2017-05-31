@extends('layouts.default')

@section('title')
    Manage Songs and Setlist
@endsection

@section('content')

    <div id="song-container">

        <div class="row" style="padding-top:2rem;">

            {{-- Left Column --}}
            {{-- Prototype for Line-ups --}}
            <div id="setlist-container" class="col s6 offset-s1">

                <div class="carousel carousel-slider center z-depth-1" data-indicators="true">
                    {{-- <div class="carousel-fixed-item center">
                        <a href="" class="btn waves-effect white grey-text darken-text-2">button</a>
                    </div> --}}

                    <div class="carousel-item white-text" href="#one!" style="background-image:url('images/music_bg.jpg'); background-size:cover;">
                        <h2></h2>
                        <p>
                            <img src="images/music_text.png" alt="" />
                        </p>
                    </div>

                </div>

                @if ($canEdit)
                    @include('_manageEvents')
                @else
                    @include('_showEvents')
                @endif

            </div>

            {{-- Right Column --}}
            <div class="col s4">
                {{-- Search Song --}}
                <div class="col s12">
                    <div class="input-field col s6 left">
                        <i class="material-icons prefix" style="margin:.7rem .5rem;">search</i>
                        <input id="search-song" type="text" v-model="searchQuery">
                        <label for="search-song">Search Song</label>
                    </div>
                </div>

                {{-- Song List --}}
                <div class="col s12">
                    <ul class="collection with-header">
                            <li class="collection-header" style="background-color:#01458e;">
                                <h5 class="white-text">
                                    <i class="material-icons left" style="font-size:1.5rem;">queue_music</i>
                                    Songs
                                    @if ($canEdit)
                                        <i class="material-icons right"
                                            style="font-size:1.5rem; cursor:pointer;"
                                            @click.prevent="toggleAddSong"
                                        >
                                            add
                                        </i>
                                    @endif
                                </h5>
                            </li>
                            <li class="collection-item"
                                style="padding:10px 5px 5px 5px;"
                                v-if="showAddSong"
                            >
                                {{-- ADD SONG container --}}
                                <div class="row">

                                    {{-- Add Song heading --}}
                                    <h6 class="col s12">
                                        Feel free to add a song.
                                        <i class="material-icons right"
                                            style="font-size:1.2rem; cursor:pointer;"
                                            @click.prevent="toggleAddSong"
                                        >
                                            close
                                        </i>
                                    </h6>

                                    {{-- Add Song: Left Pane --}}
                                    <div class="col s6">
                                        <div class="input-field col s12">
                                            <input id="title" type="text" class="validate" v-model="addSongData.title">
                                            <label for="title">Title</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <input id="artist" type="text" class="validate" v-model="addSongData.artist">
                                            <label for="artist">Artist</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="male-key" type="text" class="validate" v-model="addSongData.maleKey">
                                            <label for="male-key">Male Key</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="female-key" type="text" class="validate" v-model="addSongData.femaleKey">
                                            <label for="female-key">Female Key</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="original-key" type="text" class="validate" v-model="addSongData.originalKey">
                                            <label for="original-key">Original Key</label>
                                        </div>
                                        <div class="col right">
                                            <a href="#!"
                                                class="waves-effect waves-light btn"
                                                @click.prevent="addSong($event)"
                                            >
                                                Add Song
                                                <i class="material-icons right">send</i>
                                            </a>
                                        </div>
                                    </div>

                                    {{-- Add Song: Right Pane --}}
                                    <div class="col s6">
                                        <div class="col s12">
                                            Summary
                                        </div>
                                        <div class="col s12">
                                            <table>
                                                <thead> </thead>
                                                <tbody>
                                                    <tr>
                                                        <td> Title </td>
                                                        <td class="grey-text"> @{{ addSongData.title }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Artist </td>
                                                        <td class="grey-text"> @{{ addSongData.artist }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Male </td>
                                                        <td class="grey-text"> @{{ addSongData.maleKey }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Female </td>
                                                        <td class="grey-text"> @{{ addSongData.femaleKey }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Original </td>
                                                        <td class="grey-text"> @{{ addSongData.originalKey }} </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li class="collection-item avatar" v-for="song in alphabeticallySortedSongs">
                                {{-- List of Songs --}}
                                <i class="material-icons circle"
                                        style="font-size:1.2rem; background-color:#2680e1;"
                                >
                                    music_note
                                </i>
                                <span class="title" style="font-weight:500">[@{{ song.id }}] @{{ song.title }}</span>
                                <p>
                                    @{{ song.artist }} <br>
                                    Original: @{{ song.original_key }} | Male: @{{ song.male_key }} | Female: @{{ song.female_key }}
                                </p>
                                <span class="secondary-content">
                                    @if ($canEdit)
                                        <a href="#!"
                                            @click.prevent="toggleEditSong(song.id)"
                                        >
                                            <i class="material-icons teal-text">edit</i>
                                        </a>
                                        <a href="#!"
                                            @click.prevent="promptDeleteSongConfirmation(song.id)"
                                        >
                                            <i class="material-icons grey-text">delete</i>
                                        </a>
                                    @endif
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="edit-song-modal" class="modal">
                    <div class="modal-content row">
                        <h4>Edit @{{ editSongData.title }}</h4>
                        <div class="input-field col s12">
                            <input id="edit-title" type="text" v-model="editSongData.title">
                            <label for="edit-title">Title</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="edit-artist" type="text" v-model="editSongData.artist">
                            <label for="edit-artist">Artist</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="edit-male-key" type="text" v-model="editSongData.maleKey">
                            <label for="edit-male-key">Male Key</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="edit-female-key" type="text" v-model="editSongData.femaleKey">
                            <label for="edit-female-key">Female Key</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="edit-original-key" type="text" v-model="editSongData.originalKey">
                            <label for="edit-original-key">Original Key</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
                        <a class="modal-action waves-effect waves-green btn-flat edit-product-button"
                            @click.prevent="editSong($event)"
                        >
                            Edit
                        </a>
                    </div>
                </div>

                <div id="delete-song-confirmation-modal" class="modal">
                    <div class="modal-content">
                        <h4>Remove Song Confirmation</h4>
                        <p>
                            Are you sure you want to remove <b> @{{ removeSongData.title }} </b> from the song list?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <a class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
                        <a class="modal-action waves-effect waves-green btn-flat remove-product-button"
                            @click.prevent="deleteSong($event)"
                        >
                            Yes
                        </a>
                    </div>
                </div>

            </div>
    </div>

@endsection

@section('customScripts')
	{{-- <script src="/js/songs.js" charset="utf-8"></script> --}}
    <script type="text/javascript">
        var rawSongs = {!! $songs !!};
        var rawEvents = {!! $events !!};
    </script>
	<script src="/js/operations.js" charset="utf-8"></script>
@endsection
