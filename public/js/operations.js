'use strict';

$(document).ready(function(){
	$('.modal').modal();
});

var vm = new Vue({
	el: '#song-container',
	data:{
		searchQuery: '',
		songs: songs,
		showAddSong: false,
		addSongData:{
			title: '',
			artist: '',
			maleKey: '',
			femaleKey: ''
		},
		removeSongData:{
			uuid: 0,
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
		searchSongByUuid: function(){

		},

		toggleAddSong: function(){
			this.showAddSong = !this.showAddSong;
		},

		addSong: function(event){

			$(event.target).addClass('disabled');
			event.target.innerHTML = 'Adding Song...';

			// Should call AJAX call here ...

			// Push data to local Vue data storage
			this.songs.push({
				'title': this.addSongData.title,
				'artist': this.addSongData.artist,
				'maleKey': this.addSongData.maleKey,
				'femaleKey': this.addSongData.femaleKey
			});

			this.$nextTick(function(){
				Materialize.toast(this.addSongData.title + ' added', 2000, 'green lighten-1');
				this.clearAddSongData();
				$('input').removeClass('valid');
				$('label.active').removeClass('active');

				window.setTimeout(function(){
					$(event.target).removeClass('disabled');
					event.target.innerHTML = ' \
						Add Song \
						<i class="material-icons right">send</i>\
					';
				}, 1000);
			});

		},

		clearAddSongData: function(){
			this.addSongData.title = '';
			this.addSongData.artist = '';
			this.addSongData.maleKey = '';
			this.addSongData.femaleKey = '';
		},

		toggleEditSong: function() {

		},

		editSong: function(){

		},

		promptDeleteSongConfirmation: function(uuid){
			var index = this.searchSongByUuid(uuid);

			$('#delete-song-confirmation-modal').modal('open');
		},

		deleteSong: function(){

		}

	}
});
