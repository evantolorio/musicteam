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
                @{{ event.name }}
            </div>
            <div class="collapsible-body row">
                <div class="col s12 right-align">
                    <!-- Dropdown Trigger -->
                    <a class='dropdown-button right' href='#!' data-beloworigin="true" data-alignment="right" :data-activates="'event-options-' + event.id">
                        <i class="material-icons grey-text">settings</i>
                    </a>

                    <!-- Dropdown Structure -->
                    <ul :id="'event-options-' + event.id" class='dropdown-content' style="width:20rem;">
                        <li>
                            <a href="#!" @click.prevent="toggleEditEvent(event.id)">Edit Event</a>
                        </li>
                        <li>
                            <a href="#!" @click.prevent="promptDeleteEventConfirmation(event.id)">Delete Event</a>
                        </li>
                    </ul>
                </div>
                <div class="col s6 offset-s3">
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
                                    <table>
                                        <thead> </thead>
                                        <tbody>
                                            <tr>
                                                <td style="padding:0">Original</td>
                                                <td style="padding:0"> @{{ songs[searchSongById(songIndex.id)].original_key }} </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0">Male</td>
                                                <td style="padding:0"> @{{ songs[searchSongById(songIndex.id)].male_key }} </td>
                                            </tr>
                                            <tr>
                                                <td class="align-left" style="padding:0">Female</td>
                                                <td class="align-left" style="padding:0"> @{{ songs[searchSongById(songIndex.id)].female_key }} </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </li>
    </ul>
</div>

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