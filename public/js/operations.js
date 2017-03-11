'use strict';

$(document).ready(function(){
	$('.modal').modal();
	$('.collapsible').collapsible();
	$('.carousel.carousel-slider').carousel({fullWidth:true});
});

var vm = new Vue({
	el: '#song-container',
	data:{
		searchQuery: '',
		events: rawEvents,
		songs: rawSongs,
		showAddSong: false,
		addEventData:{
			name: '',
			songs: []
		},
		editEventData:{
			index: 0,
			eventId: 0,
			name: ''
		},
		removeEventData:{
			index: 0,
			eventId: 0,
			name: ''
		},
		addSongData:{
			title: '',
			artist: '',
			originalKey: '',
			maleKey: '',
			femaleKey: ''
		},
		editSongData: {
			index: 0,
			songId: 0,
			title: '',
			artist: '',
			originalKey: '',
			maleKey: '',
			femaleKey: ''
		},
		removeSongData:{
			index: 0,
			songId: 0,
			title: ''
		}
	},
	computed: {
		alphabeticallySortedSongs: function(){
			var songs = this.songs,
				searchQuery = this.searchQuery.toLowerCase();

			if(searchQuery){
				songs = songs.filter(function(song){
					return Object.keys(song).some(function(key){
						return String(song[key]).toLowerCase().indexOf(searchQuery) > -1;
					});
				});
			}

			return _.sortBy(songs, ['title']);
		}
	},
	methods:{
		searchSongById: function(id){
			// Return index of productId to find
            for(var i = 0; i < this.songs.length; i++) {
                if(this.songs[i].id === id) return i;
            }
		},

		searchEventById: function(id){
			// Return index of eventId to find
            for(var i = 0; i < this.events.length; i++) {
                if(this.events[i].id === id) return i;
            }
		},

		toggleAddSong: function(){
			this.showAddSong = !this.showAddSong;
		},

		addSong: function(event){

			// For disabling the button
			$(event.target).addClass('disabled');
			event.target.innerHTML = 'Adding Song...';

			// Do AJAX
            this.$http.post(
                '/song',
                {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    title: this.addSongData.title,
                    artist: this.addSongData.artist,
					originalKey: this.addSongData.originalKey,
					maleKey: this.addSongData.maleKey,
					femaleKey: this.addSongData.femaleKey
                }
            ).then(
                function(response){

					// Push data to local Vue data storage
					this.songs.push({
						'title': this.addSongData.title,
						'artist': this.addSongData.artist,
						'original_key': this.addSongData.originalKey,
						'male_key': this.addSongData.maleKey,
						'female_key': this.addSongData.femaleKey
					});

					this.$nextTick(function(){
						Materialize.toast(this.addSongData.title + ' added', 2000, 'green lighten-1');
						this.clearAddSongData();
						$('input').removeClass('valid');
						$('label.active').removeClass('active');

						// For enabling the button
						$(event.target).removeClass('disabled');
						event.target.innerHTML = ' \
							Add Song \
							<i class="material-icons right">send</i>\
						';
					});

                },
                function(response){
					Materialize.toast(response.statusText, 2000, 'red lighten-1');
                    console.log(response.statusText);
                }
            );

		},

		clearAddSongData: function(){
			this.addSongData.title = '';
			this.addSongData.artist = '';
			this.addSongData.originalKey = '';
			this.addSongData.maleKey = '';
			this.addSongData.femaleKey = '';
		},

		toggleEditSong: function(id) {
			var index = this.searchSongById(id);

			this.editSongData.index = index;
			this.editSongData.songId = this.songs[index].id;
			this.editSongData.title = this.songs[index].title;
			this.editSongData.artist = this.songs[index].artist;
			this.editSongData.originalKey = this.songs[index].original_key;
			this.editSongData.maleKey = this.songs[index].male_key;
			this.editSongData.femaleKey = this.songs[index].female_key;

			$("label[for=edit-title], label[for=edit-artist], label[for=edit-original-key], label[for=edit-male-key], label[for=edit-female-key]").addClass('active');
			$('#edit-song-modal').modal('open');
		},

		editSong: function(event){

			// For disabling the button
			$(event.target).addClass('disabled');
			event.target.innerHTML = 'Editing Song...';

			// Do AJAX
            this.$http.patch(
                '/song',
                {
                    _token: $('meta[name="csrf-token"]').attr('content'),
					songId: this.editSongData.songId,
                    title: this.editSongData.title,
                    artist: this.editSongData.artist,
					originalKey: this.editSongData.originalKey,
					maleKey: this.editSongData.maleKey,
					femaleKey: this.editSongData.femaleKey
                }
            ).then(
                function(response){

					// Update local Vue data storage
					var index = this.editSongData.index;

					this.songs[index].title = this.editSongData.title;
					this.songs[index].artist = this.editSongData.artist;
					this.songs[index].original_key = this.editSongData.originalKey;
					this.songs[index].male_key = this.editSongData.maleKey;
					this.songs[index].female_key = this.editSongData.femaleKey;

					this.$nextTick(function(){
						$('#edit-song-modal').modal('close');

						Materialize.toast(this.editSongData.title + ' edited', 2000, 'green lighten-1');

						// For enabling the button
						$(event.target).removeClass('disabled');
						event.target.innerHTML = 'Edit';
					});
                },
                function(response){
					Materialize.toast(response.statusText, 2000, 'red lighten-1');
                    console.log(response.statusText);
                }
            );

		},

		promptDeleteSongConfirmation: function(id){
			var index = this.searchSongById(id);

			this.removeSongData.index = index;
			this.removeSongData.songId = this.songs[index].id;
			this.removeSongData.title = this.songs[index].title;

			$('#delete-song-confirmation-modal').modal('open');
		},

		deleteSong: function(event){

			// For disabling the button
			$(event.target).addClass('disabled');
			event.target.innerHTML = 'Deleting Song...';

			// Do AJAX
            this.$http.delete(
                '/song',
                {
					body:{
						_token: $('meta[name="csrf-token"]').attr('content'),
						songId: this.removeSongData.songId,
                    }
                }
            ).then(
                function(response){

					// Remove song from local Vue data storage
					this.songs.splice(this.removeSongData.index,1);

					this.$nextTick(function(){
						$('#delete-song-confirmation-modal').modal('close');

						Materialize.toast(this.removeSongData.title + ' deleted', 2000, 'green lighten-1');

						// For enabling the button
						$(event.target).removeClass('disabled');
						event.target.innerHTML = 'Yes';
					});
                },
                function(response){
					Materialize.toast(response.statusText, 2000, 'red lighten-1');
                    console.log(response.statusText);
                }
            );
		},

		toggleAddEvent: function(){
			$('#add-event-modal').modal('open');
		},

		addEvent: function(event){

			// For disabling the button
			$(event.target).addClass('disabled');
			event.target.innerHTML = 'Adding Event...';

			// Do AJAX
            this.$http.post(
                '/event',
                {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    name: this.addEventData.name
                }
            ).then(
                function(response){

					var eventId = response.body;

					// Push data to local Vue data storage
					this.events.push({
						'id': eventId,
						'name': this.addEventData.name,
						'songs': []
					});

					this.$nextTick(function(){
						Materialize.toast(this.addEventData.name + ' added', 2000, 'green lighten-1');

						$('#add-event-modal').modal('close');

						this.addEventData.name = '';
						$('label.active').removeClass('active');

						// For enabling the button
						$(event.target).removeClass('disabled');
						event.target.innerHTML = 'Add';
					});

                },
                function(response){
					Materialize.toast(response.statusText, 2000, 'red lighten-1');
                    console.log(response.statusText);
                }
            );
		},

		toggleEditEvent: function(id){
			var index = this.searchEventById(id);

			this.editEventData.index = index;
			this.editEventData.eventId = this.events[index].id;
			this.editEventData.name = this.events[index].name;

			$("label[for=edit-name]").addClass('active');
			$('#edit-event-modal').modal('open');
		},

		editEvent: function(event){

			// For disabling the button
			$(event.target).addClass('disabled');
			event.target.innerHTML = 'Editing Event...';

			// Do AJAX
            this.$http.patch(
                '/event',
                {
                    _token: $('meta[name="csrf-token"]').attr('content'),
					eventId: this.editEventData.eventId,
					name: this.editEventData.name
                }
            ).then(
                function(response){

					// Update local Vue data storage
					var index = this.editEventData.index;

					this.events[index].name = this.editEventData.name;

					this.$nextTick(function(){
						$('#edit-event-modal').modal('close');

						Materialize.toast(this.editEventData.name + ' edited', 2000, 'green lighten-1');

						// For enabling the button
						$(event.target).removeClass('disabled');
						event.target.innerHTML = 'Edit';
					});
                },
                function(response){
					Materialize.toast(response.statusText, 2000, 'red lighten-1');
                    console.log(response.statusText);
                }
            );

		},

		promptDeleteEventConfirmation: function(id){
			var index = this.searchEventById(id);

			this.removeEventData.index = index;
			this.removeEventData.eventId = this.events[index].id;
			this.removeEventData.name = this.events[index].name;

			$('#delete-event-confirmation-modal').modal('open');
		},

		deleteEvent: function(event){

			// For disabling the button
			$(event.target).addClass('disabled');
			event.target.innerHTML = 'Deleting Event...';

			// Do AJAX
            this.$http.delete(
                '/event',
                {
					body:{
						_token: $('meta[name="csrf-token"]').attr('content'),
						eventId: this.removeEventData.eventId,
                    }
                }
            ).then(
                function(response){

					// Remove song from local Vue data storage
					this.events.splice(this.removeEventData.index,1);

					this.$nextTick(function(){
						$('#delete-event-confirmation-modal').modal('close');

						Materialize.toast(this.removeEventData.name + ' deleted', 2000, 'green lighten-1');

						// For enabling the button
						$(event.target).removeClass('disabled');
						event.target.innerHTML = 'Yes';
					});
                },
                function(response){
					Materialize.toast(response.statusText, 2000, 'red lighten-1');
                    console.log(response.statusText);
                }
            );
		}

	}
});
