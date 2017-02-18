'use strict';

$(document).ready(function(){
	$('.modal').modal();
});

var vm = new Vue({
	el: '#song-container',
	data:{
		searchQuery: '',
		songs: rawSongs,
		showAddSong: false,
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

		editSong: function(){

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

		deleteSong: function(){

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
