@extends('layouts.default')

@section('title')
    Manage Songs
@endsection

@section('content')

    <div id="song-container">
        {{-- <div class="row" style="padding-top:1.5em;">
            <div class="col s12">
                <div class="caption">
                    The following are the recommended song keys
                </div>
            </div>
        </div> --}}

        <div class="row" style="padding-top:2rem;">

            {{-- Left Column --}}
            {{-- Prototype for Line-ups --}}
            <div class="col s6 offset-s1">
                <div class="col s6">
                    <h5>
                        Sunday (February 5, 2017)
                    </h5>

                    <table class="bordered">
                        <thead>
                            <tr>
                                <td style="font-weight:400"> Song </td>
                                <td style="font-weight:400"> Recommended Keys </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="i in 4">
                                <td>
                                    @{{ songs[i].title }} <br>
                                    <span class="grey-text"> @{{ songs[i].artist }}</span>
                                </td>
                                <td>
                                    <table>
                                        <thead> </thead>
                                        <tbody>
                                            <tr>
                                                <td style="padding:0">Original</td>
                                                <td style="padding:0"> @{{ songs[i].maleKey }} </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0">Male</td>
                                                <td style="padding:0"> @{{ songs[i].maleKey }} </td>
                                            </tr>
                                            <tr>
                                                <td class="align-left" style="padding:0">Female</td>
                                                <td class="align-left" style="padding:0"> @{{ songs[i].femaleKey }} </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col s6">
                    <h5>
                        Midweek (February 15-16, 2017)
                    </h5>

                    <table class="bordered">
                        <thead>
                            <tr>
                                <td style="font-weight:400"> Song </td>
                                <td style="font-weight:400"> Recommended Keys </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="i in 4">
                                <td>
                                    @{{ songs[i].title }} <br>
                                    <span class="grey-text"> @{{ songs[i].artist }}</span>
                                </td>
                                <td>
                                    <table>
                                        <thead> </thead>
                                        <tbody>
                                            <tr>
                                                <td style="padding:0">Original</td>
                                                <td style="padding:0"> @{{ songs[i].maleKey }} </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0">Male</td>
                                                <td style="padding:0"> @{{ songs[i].maleKey }} </td>
                                            </tr>
                                            <tr>
                                                <td class="align-left" style="padding:0">Female</td>
                                                <td class="align-left" style="padding:0"> @{{ songs[i].femaleKey }} </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Right Column --}}
            <div class="col s4">
                {{-- Search Song --}}
                <div class="col s12">
                    <div class="input-field col s5 right">
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
                                    <i class="material-icons right"
                                        style="font-size:1.5rem; cursor:pointer;"
                                        @click.prevent="toggleAddSong"
                                    >
                                        add
                                    </i>
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
                                        style="font-size:1.2rem;"
                                >
                                    music_note
                                </i>
                                <span class="title" style="font-weight:500">@{{ song.title }}</span>
                                <p>
                                    @{{ song.artist }} <br>
                                    Original: @{{ song.maleKey }} | Male: @{{ song.maleKey }} | Female: @{{ song.femaleKey }}
                                </p>
                                <span class="secondary-content">
                                    <a href="#!"
                                        @click.prevent="toggleEditSong"
                                    >
                                        <i class="material-icons teal-text">edit</i>
                                    </a>
                                    <a href="#!"
                                        @click.prevent="promptDeleteSongConfirmation"
                                    >
                                        <i class="material-icons grey-text">delete</i>
                                    </a>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="delete-song-confirmation-modal" class="modal">
                    <div class="modal-content">
                        <h4>Remove Song Confirmation</h4>
                        <p>
                            Are you sure you want to remove @{{ removeSongData.title }} from the list?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <a class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
                        <a class="modal-action waves-effect waves-green btn-flat remove-product-button"
                            @click.prevent="deleteSong"
                        >
                            Yes
                        </a>
                    </div>
                </div>

            </div>
    </div>

@endsection

@section('customScripts')
	<script src="/js/songs.js" charset="utf-8"></script>
	<script src="/js/operations.js" charset="utf-8"></script>
@endsection
