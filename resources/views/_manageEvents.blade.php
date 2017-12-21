<div class="col s12 center-align" style="margin-top:2rem;">
    <h4>
        <b>SETLIST</b>
    </h4>
</div>

<div id="add-event-container"
    class="col s12 valign-wrapper center-align"
    @click.prevent="toggleAddEvent"
>
    <span class="valign">
        <i class="material-icons left">add</i> Add Event
    </span>
</div>

<div class="col s12">
    <ul id="events-container" class="collapsible popout" data-collapsible="accordion">
        <li v-for="event in events" :id="'event-' + event.id">
            <div class="collapsible-header">
                <i class="material-icons">event_available</i>
                <span>@{{ event.parsedName }}</span>
                <span class="right">@{{ event.parsedDate }}</span>
            </div>
            <div class="collapsible-body row">
                <div class="col s12 right-align">
                    {{-- Add Event songs --}}
                    <a href="#!"
                        style="margin-right:1rem;"
                        @click.prevent="toggleAddEventSongs(event.id)"
                    >
                        <i class="material-icons teal-text">add</i>
                    </a>

                    {{-- Edit Event songs --}}
                    <a href="#!"
                        style="margin-right:1rem;"
                        @click.prevent="toggleEditEventSongs(event.id)"
                    >
                        <i class="material-icons teal-text">edit</i>
                    </a>

                    <!-- Dropdown Trigger -->
                    <a class='dropdown-button right' href='#!' data-beloworigin="true" data-alignment="right" :data-activates="'event-options-' + event.id">
                        <i class="material-icons grey-text">settings</i>
                    </a>

                    <!-- Dropdown Structure -->
                    <ul :id="'event-options-' + event.id" class='dropdown-content' style="width:12rem;">
                        <li>
                            <a href="#!" @click.prevent="toggleEditEvent(event.id)">Edit Event</a>
                        </li>
                        <li>
                            <a href="#!" @click.prevent="promptDeleteEventConfirmation(event.id)">Delete Event</a>
                        </li>
                    </ul>
                </div>
                <div class="col s8 offset-s2">
                    {{-- Event lists --}}
                    <table class="bordered">
                        <thead>
                            <tr>
                                <td style="font-weight:400"> Song </td>
                                <td style="font-weight:400"> Recommended Keys </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="songIndex in event.songs">
                                <td>
                                    @{{ songs[searchSongById(songIndex.id)].title }} <br>
                                    <span class="grey-text"> @{{ songs[searchSongById(songIndex.id)].artist }}</span>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col s8">
                                            Original
                                        </div>
                                        <div class="col s4">
                                            @{{ songs[searchSongById(songIndex.id)].original_key }}
                                        </div>

                                        <div class="col s8">
                                            Male
                                        </div>
                                        <div class="col s4">
                                            @{{ songs[searchSongById(songIndex.id)].male_key }}
                                        </div>

                                        <div class="col s8">
                                            Female
                                        </div>
                                        <div class="col s4">
                                            @{{ songs[searchSongById(songIndex.id)].female_key }}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </li>
    </ul>
</div>

{{-- Add Event modal --}}
<div id="add-event-modal" class="modal">
    <div class="modal-content row">
        <h4>Add Event</h4>
        <div class="input-field col s12">
            <input id="event-name" type="text" v-model="addEventData.name">
            <label for="event-name">Event Name</label>
        </div>
    </div>
    <div class="modal-footer">
        <a class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
        <a class="modal-action waves-effect waves-green btn-flat edit-product-button"
            @click.prevent="addEvent($event)"
        >
            Add
        </a>
    </div>
</div>

{{-- Edit Event modal --}}
<div id="edit-event-modal" class="modal">
    <div class="modal-content row">
        <h4>Edit @{{ editEventData.name }}</h4>
        <div class="input-field col s12">
            <input id="edit-name" type="text" v-model="editEventData.name">
            <label for="edit-name">Name</label>
        </div>
    </div>
    <div class="modal-footer">
        <a class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
        <a class="modal-action waves-effect waves-green btn-flat edit-product-button"
            @click.prevent="editEvent($event)"
        >
            Edit
        </a>
    </div>
</div>

{{-- Delete Event modal --}}
<div id="delete-event-confirmation-modal" class="modal">
    <div class="modal-content">
        <h4>Remove Event Confirmation</h4>
        <p>
            Are you sure you want to remove <b> @{{ removeEventData.name }} </b> event from the setlist?
        </p>
    </div>
    <div class="modal-footer">
        <a class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
        <a class="modal-action waves-effect waves-green btn-flat remove-product-button"
            @click.prevent="deleteEvent($event)"
        >
            Yes
        </a>
    </div>
</div>

{{-- Add Event Songs modal --}}
<div id="add-event-songs-modal" class="modal">
    <div class="modal-content row">
        <h4>Add Songs to @{{ addEventSongsData.name }} </h4>
        <blockquote class="info left-align">
            Input should be numbers separated by commas. Ex: 1, 2, 3
        </blockquote>
        <div class="input-field col s12">
            <input id="event-songs-ids" type="text" v-model="addEventSongsData.songs">
            <label for="event-songs-ids">Song IDs</label>
        </div>
    </div>
    <div class="modal-footer">
        <a class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
        <a class="modal-action waves-effect waves-green btn-flat edit-product-button"
            @click.prevent="addEventSongs($event)"
        >
            Add
        </a>
    </div>
</div>
