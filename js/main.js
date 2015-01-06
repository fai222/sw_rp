var character_sheet;
$(document).ready(function() {
	function displayData() {
		for(var i = 0 in character_sheet) {
			if(i == "character_sheet_data"){
				for(var ii = 0 in character_sheet[i]) {
					for(var iii = 0 in character_sheet[i][ii]) {
						if($('#' + iii).hasClass("skillRankContainer")) {
							var key = iii + "_characteristic";
							var characteristic = character_sheet[i][ii][key];
							var ranked_levels = $('#' + iii + " .skillRank").slice(0, (character_sheet[i][ii][characteristic]));
							ranked_levels.addClass('ranked');
							var trained_levels = $('#' + iii + " .skillRank").slice(0, (character_sheet[i][ii][iii]));
							trained_levels.addClass('trained');
						} else {
							$('#' + iii).attr('value', character_sheet[i][ii][iii]);
						}
					}
				}
			} else {
				for(var ii = 0 in character_sheet[i]) {
					for(var iii = 0 in character_sheet[i][ii]) {
						console.log(iii);
					}
				}
			}
		}
	}

	function calculateData() {
		//Wound threshold
		var wounds = parseInt($("#base_wounds_threshold").attr('value')) + parseInt($("#brawn").attr('value'));
		$("#wounds_threshold").attr('value', wounds);

		//Strain threshold
		var strain = parseInt($("#base_strain_threshold").attr('value')) + parseInt($("#willpower").attr('value'));
		$("#strain_threshold").attr('value', strain);

		//Soak value
		var soak = parseInt($("#brawn").attr('value'));
		$("#soak_value").attr('value', soak);
	}

	function getCharacterSheet() {
		$.get("php/fetch_character_sheet.php", function(data, status) {
			if(status == "success") {
				character_sheet = JSON.parse(data);
				console.log("Character Sheet retrieved and parsed.");
				console.log(character_sheet);
				displayData();
				calculateData();
			}
		});
	}
	getCharacterSheet();
});