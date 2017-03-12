<div id="first-two-events-container" class="col s12">
    @foreach ($firstTwoEvents as $event)
        <div class="col s6">
            <h6>
                {{ $event->name }}
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
                                <table>
                                    <thead> </thead>
                                    <tbody>
                                        <tr>
                                            <td style="padding:0">Original</td>
                                            <td style="padding:0"> {{ $song->original_key }} </td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0">Male</td>
                                            <td style="padding:0"> {{ $song->male_key }} </td>
                                        </tr>
                                        <tr>
                                            <td class="align-left" style="padding:0">Female</td>
                                            <td class="align-left" style="padding:0"> {{ $song->female_key }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @endforeach
</div>

<div class="col s12" style="margin-top:2rem;">
    <ul id="events-container" class="collapsible popout" data-collapsible="accordion">
        <li v-for="event in events" :id="'event-' + event.id">
            <div class="collapsible-header">
                <i class="material-icons">event_available</i>
                @{{ event.name }}
            </div>
            <div class="collapsible-body row">
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
