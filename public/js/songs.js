'use strict';

var songs = [
		{
			'title': 'My God',
			'artist': 'Victory Worship',
			'maleKey': 'B',
			'femaleKey': 'D'
		},
		{
			'title': 'Nothing is Impossible',
			'artist': 'Planetshakers',
			'maleKey': 'C',
			'femaleKey': 'E'
		},
		{
			'title': 'Jesus My Savior',
			'artist': 'Victor Worship',
			'maleKey': 'B',
			'femaleKey': 'E'
		},
		{
			'title': 'Cornerstone',
			'artist': 'Hillsong',
			'maleKey': 'C',
			'femaleKey': 'E'
		},
		{
			'title': 'Faithful',
			'artist': 'Victory Worship',
			'maleKey': 'C',
			'femaleKey': 'E'
		},
		{
			'title': 'God is Able',
			'artist': 'Hillsong',
			'maleKey': 'A',
			'femaleKey': 'C'
		},
		{
			'title': 'O What a Savior',
			'artist': 'Mid-Cities Worship',
			'maleKey': 'B',
			'femaleKey': 'D'
		},
		{
			'title': 'You',
			'artist': 'Hillsong',
			'maleKey': 'B',
			'femaleKey': 'E'
		},
		{
			'title': 'Broken Vessels',
			'artist': 'Hillsong',
			'maleKey': 'B',
			'femaleKey': 'G'
		},
		{
			'title': 'One Thing Remains',
			'artist': 'Bethel Music',
			'maleKey': 'B',
			'femaleKey': 'E'
		},
		{
			'title': 'Hands to the Sky',
			'artist': 'Mid-Cities Worship',
			'maleKey': 'B',
			'femaleKey': 'D'
		},
		{
			'title': 'Radical Love',
			'artist': 'Victory Worship',
			'maleKey': 'B',
			'femaleKey': 'E'
		},
		{
			'title': 'With Everything',
			'artist': 'Hillsong',
			'maleKey': 'B',
			'femaleKey': 'E'
		},
		{
			'title': 'Grace Changes Everything',
			'artist': 'Victory Worship',
			'maleKey': 'D',
			'femaleKey': 'E'
		},
		{
			'title': 'Beauty for Ashes',
			'artist': 'Mid-Cities',
			'maleKey': 'A',
			'femaleKey': 'D'
		},
		{
			'title': 'King Forevermore',
			'artist': 'Mid-Cities Worship',
			'maleKey': 'B',
			'femaleKey': 'D'
		},
		{
			'title': 'Unending Love',
			'artist': 'Hillsong',
			'maleKey': 'D',
			'femaleKey': 'D'
		},
		{
			'title': 'One Thing',
			'artist': 'Hillsong',
			'maleKey': 'C',
			'femaleKey': 'E'
		},
		{
			'title': 'Dance in Freedom',
			'artist': 'Victory Worship',
			'maleKey': 'C',
			'femaleKey': 'D'
		},
		{
			'title': 'Lost Without You',
			'artist': 'Every Nation',
			'maleKey': 'E',
			'femaleKey': 'A'
		},
		{
			'title': 'All I\'m After',
			'artist': 'Mid-Cities Worship',
			'maleKey': 'E',
			'femaleKey': 'B'
		},
		{
			'title': 'Lay It Down',
			'artist': 'Victory Worship',
			'maleKey': 'G',
			'femaleKey': 'B'
		},
		{
			'title': 'Relentless',
			'artist': 'Hillsong',
			'maleKey': 'D',
			'femaleKey': 'E'
		},
		{
			'title': 'We Stand In Awe',
			'artist': 'Every Nation',
			'maleKey': 'D',
			'femaleKey': 'E'
		},
		{
			'title': 'Author of My Life',
			'artist': 'Every Nation',
			'maleKey': 'G',
			'femaleKey': 'A'
		},
		{
			'title': 'Wake',
			'artist': 'Hillsong Young and Free',
			'maleKey': 'E',
			'femaleKey': 'G'
		},
		{
			'title': 'Lead Me Onward',
			'artist': 'Every Nation',
			'maleKey': 'B',
			'femaleKey': 'E'
		},
		{
			'title': 'With Us',
			'artist': 'Hillsong',
			'maleKey': 'D',
			'femaleKey': 'D'
		},
		{
			'title': 'The Difference',
			'artist': 'Hillsong',
			'maleKey': 'A',
			'femaleKey': 'A'
		},
		{
			'title': 'Oceans',
			'artist': 'Hillsong',
			'maleKey': 'B',
			'femaleKey': 'D'
		},
		{
			'title': 'We Will Go',
			'artist': 'Victory Worship',
			'maleKey': '',
			'femaleKey': ''
		},
		{
			'title': 'Everlasting Glory',
			'artist': 'Victory Worship',
			'maleKey': '',
			'femaleKey': ''
		},
		{
			'title': 'Commission my Soul',
			'artist': 'Citipointe',
			'maleKey': '',
			'femaleKey': ''
		},
		{
			'title': 'Endless Praise',
			'artist': 'Planetshakers',
			'maleKey': 'E',
			'femaleKey': 'G'
		},
		{
			'title': 'Reign Forever',
			'artist': 'Victory Worship',
			'maleKey': '',
			'femaleKey': ''
		},
		{
			'title': 'Pursue/All I Need is You',
			'artist': 'Hillsong',
			'maleKey': '',
			'femaleKey': ''
		},
		{
			'title': 'Strength of My Life',
			'artist': 'Planetshakers',
			'maleKey': '',
			'femaleKey': ''
		},
		{
			'title': 'Blessing and Honor',
			'artist': 'Victory Worship',
			'maleKey': '',
			'femaleKey': ''
		},
		{
			'title': 'Lord of All',
			'artist': 'Victory Worship',
			'maleKey': '',
			'femaleKey': ''
		},
		{
			'title': 'Alive',
			'artist': 'Hillsong Young and Free',
			'maleKey': '',
			'femaleKey': ''
		},
		{
			'title': 'This is Living',
			'artist': 'Hillsong Young and Free',
			'maleKey': '',
			'femaleKey': ''
		},
		{
			'title': 'Higher Wider Deeper',
			'artist': 'Citipointe',
			'maleKey': '',
			'femaleKey': ''
		},
		{
			'title': 'Overcome the World',
			'artist': 'Victory Worship',
			'maleKey': '',
			'femaleKey': ''
		},
		{
			'title': 'Praise You Lord',
			'artist': 'Planetshakers',
			'maleKey': 'E',
			'femaleKey': 'G'
		},
		{
			'title': 'Real Love',
			'artist': 'Hillsong Young and Free',
			'maleKey': 'B',
			'femaleKey': 'D'
		},
		{
			'title': 'Heart Open Wide',
			'artist': 'Citipointe',
			'maleKey': 'B',
			'femaleKey': 'D'
		},
		{
			'title': 'Falling',
			'artist': 'Every Nation',
			'maleKey': 'E',
			'femaleKey': 'G'
		},
		{
			'title': 'Yours Forever',
			'artist': 'Hillsong',
			'maleKey': 'D',
			'femaleKey': 'E'
		},
		{
			'title': 'We Will Not Conform',
			'artist': 'Victory Worship',
			'maleKey': 'D',
			'femaleKey': 'E'
		},
		{
			'title': 'God\'s Great Dancefloor',
			'artist': 'Victory Worship',
			'maleKey': '',
			'femaleKey': ''
		}
	];

	var i = 1;
	songs.forEach(function(element){
		element.id = i;
		i++;
	});
