<div class="col s12 center-align" style="margin-top:2rem;">
    <h4>
        <b>CURRENT SETLIST</b>
    </h4>
    <blockquote class="info left-align" style="margin-left:1rem;">
        Resources for new songs can be seen here:
        <a href="https://drive.google.com/drive/folders/0B9ktLjQHBcExVHhBZ29GNUtRTUE" target="_blank">Click here.</a>
    </blockquote>
</div>

<div id="first-two-events-container" class="col s12">
    @foreach ($firstThreeEvents as $event)
        <div class="col s6" style="margin-top: 1rem;">
            <h6>
                <span> {{ $event->parsedName }} </span> <br>
                <span style="font-size:1rem;"> {{ $event->parsedDate }} </span>
            </h6>

            <table class="bordered">
                <thead>
                    <tr>
                        <td style="font-weight:400"> Song </td>
                        <td style="font-weight:400"> Recommended Keys </td>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($event->songs as $song)
                        <tr>
                            <td>
                                {{ $song->title }} <br>
                                <span class="grey-text"> {{ $song->artist }}</span>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s8">
                                        Original
                                    </div>
                                    <div class="col s4">
                                        {{ $song->original_key }}
                                    </div>

                                    <div class="col s8">
                                        Male
                                    </div>
                                    <div class="col s4">
                                        {{ $song->male_key }}
                                    </div>

                                    <div class="col s8">
                                        Female
                                    </div>
                                    <div class="col s4">
                                        {{ $song->female_key }}
                                    </div>
                                </div>
                                {{-- <table>
                                    <thead> </thead>
                                    <tbody>
                                        <tr>
                                            <td style="padding:0"></td>
                                            <td class="align-left" style="padding:0">  </td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0">Male</td>
                                            <td class="align-left" style="padding:0"> {{ $song->male_key }} </td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0">Female</td>
                                            <td class="align-left" style="padding:0"> {{ $song->female_key }} </td>
                                        </tr>
                                    </tbody>
                                </table> --}}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @endforeach
        <div class="col s6" style="margin-top: 1rem;">
            <h6>
                Other Events
            </h6>
        </div>
</div>

<div class="col s12 center-align" style="margin-top:2rem;">
    <h4>
        <b>SETLIST</b>
    </h4>
</div>

<div class="col s12 left-align" style="margin-left:2rem;">
    <span class="grey-text left-align">Click on the specified date to show its respective setlist.</span>

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
                <div class="col s8 offset-s2">
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
