var character_sheet;
$(document).ready(function() {

	rowTemplate = {
		'talent': "<div class=\"row talentRow\"><input type=\"hidden\" id=\"talent_id\" readonly/><div class=\"talentName\"><input id=\"talent_name\" class=\"talentInput\" type=\"text\"/></div><div class=\"talentPage\"><input id=\"talent_page\" class=\"talentInput\" type=\"text\"/></div><div class=\"talentSummary\"><input id=\"talent_summary\" class=\"talentInput\" type=\"text\"/></div></div>",
		'weapon': "<div class=\"row weaponRow\"><div class=\"weaponName\"><input id=\"weapon_name\" class=\"weaponInput\" type=\"text\"/></div><div class=\"weaponPage\"><input id=\"weapon_page\" class=\"weaponInput\" type=\"text\"/></div><div class=\"weaponSkill\"><input id=\"weapon_skill\" class=\"weaponInput\" type=\"text\"/></div><div class=\"weaponDamage\"><input id=\"weapon_damage\" class=\"weaponInput\" type=\"text\"/></div><div class=\"weaponCritical\"><input id=\"weapon_critical\" class=\"weaponInput\" type=\"text\"/></div><div class=\"weaponRange\"><input id=\"weapon_range\" class=\"weaponInput\" type=\"text\"/></div><div class=\"weaponHardpoints\"><input id=\"weapon_hardpoints\" class=\"weaponInput\" type=\"text\"/></div><div class=\"weaponEncumbrance\"><input id=\"weapon_encumbrance\" class=\"weaponInput\" type=\"text\"/></div><div class=\"weaponSpecial\"><input id=\"weapon_special\" class=\"weaponInput\" type=\"text\"/></div><div class=\"weaponAttachment\"><img src=\"img/icon_attachment.png\" width=\"13px\" height=\"auto\"></div></div>",
		'armor': "<div class=\"row armorRow\"><div class=\"armorName\"><input id=\"armor_name\" class=\"armorInput\" type=\"text\"/></div><div class=\"armorPage\"><input id=\"armor_page\" class=\"armorInput\" type=\"text\"/></div><div class=\"armorDefence\"><input id=\"armor_defence\" class=\"armorInput\" type=\"text\"/></div><div class=\"armorSoak\"><input id=\"armor_soak\" class=\"armorInput\" type=\"text\"/></div><div class=\"armorHardpoints\"><input id=\"armor_hardpoints\" class=\"armorInput\" type=\"text\"/></div><div class=\"armorEncumbrance\"><input id=\"armor_encumbrance\" class=\"armorInput\" type=\"text\"/></div><div class=\"armorAttachment\"><img src=\"img/icon_attachment.png\" width=\"13px\" height=\"auto\"></div></div>",
		'item': "<div class=\"row itemRow\"><div class=\"itemName\"><input id=\"item_name\" class=\"itemInput\" type=\"text\"/></div><div class=\"itemPage\"><input id=\"item_page\" class=\"itemInput\" type=\"text\"/></div><div class=\"itemQuantity\"><input id=\"item_quantity\" class=\"itemInput\" type=\"text\"/></div><div class=\"itemEncumbrance\"><input id=\"item_encumbrance\" class=\"itemInput\" type=\"text\"/></div></div>"
	};

	function displayData() {
		for(var i = 0 in character_sheet) {
			if(i == "character_sheet_data") {
				for(var ii = 0 in character_sheet[i]) {
					for(var iii = 0 in character_sheet[i][ii]) {

						if($('#' + iii).hasClass('skillRankContainer')) {
							var key = iii + "_characteristic";
							var characteristic = character_sheet[i][ii][key];
							var ranked_levels = $('#' + iii + ' .skillRank').slice(0, (character_sheet[i][ii][characteristic]));
							ranked_levels.addClass('ranked');
							var trained_levels = $('#' + iii + ' .skillRank').slice(0, (character_sheet[i][ii][iii]));
							trained_levels.addClass('trained');
						} else {
							$('#' + iii).val(character_sheet[i][ii][iii]);
						}

					}
				}

			} else if(i == "description") {

				for(var ii = 0 in character_sheet[i]) {
					for(var iii = 0 in character_sheet[i][ii]) {
						$('#description_' + iii).val(character_sheet[i][ii][iii]);
					}
				}

			} else {
				var rowSelector = "." + i + "Row";
				var rowContainerSelector = rowSelector + "Container";

				if($(rowContainerSelector).length) {
					$(rowContainerSelector).empty();
					for(var ii = 0 in character_sheet[i]) {
						$(rowContainerSelector).append(rowTemplate[i]);
						for(var iii = 0 in character_sheet[i][ii]) {
							$(rowSelector + ':last-child #' + i + '_' + iii).val(character_sheet[i][ii][iii]);
						}
					}
				}
			}
		}
	}

	function calculateData() {
		//Wound threshold
		var wounds = parseInt($('#base_wounds_threshold').attr('value')) + parseInt($('#brawn').attr('value'));
		$('#wounds_threshold').attr('value', wounds);

		//Strain threshold
		var strain = parseInt($('#base_strain_threshold').attr('value')) + parseInt($('#willpower').attr('value'));
		$('#strain_threshold').attr('value', strain);

		//Soak value
		var soak = parseInt($('#brawn').attr('value'));
		$('#soak_value').attr('value', soak);
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