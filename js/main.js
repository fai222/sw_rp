var character_sheet;
$(document).ready(function() {

	rowTemplate = {
		'talent': "<div class=\"row talentRow\" data-rowId=\"\"><div class=\"talentName\"><input id=\"talent_name\" data-entry=\"name\" class=\"talentInput\" type=\"text\"/></div><div class=\"talentPage\"><input id=\"talent_page\" data-entry=\"page\" class=\"talentInput\" type=\"text\"/></div><div class=\"talentSummary\"><input id=\"talent_summary\" data-entry=\"summary\" class=\"talentInput\" type=\"text\"/></div></div>",
		'weapon': "<div class=\"row weaponRow\" data-rowId=\"\"><div class=\"weaponName\"><input id=\"weapon_name\" data-entry=\"name\" class=\"weaponInput\" type=\"text\"/></div><div class=\"weaponPage\"><input id=\"weapon_page\" data-entry=\"page\" class=\"weaponInput\" type=\"text\"/></div><div class=\"weaponSkill\"><input id=\"weapon_skill\" data-entry=\"skill\" class=\"weaponInput\" type=\"text\"/></div><div class=\"weaponDamage\"><input id=\"weapon_damage\" data-entry=\"damage\" class=\"weaponInput\" type=\"text\"/></div><div class=\"weaponCritical\"><input id=\"weapon_critical\" data-entry=\"critical\" class=\"weaponInput\" type=\"text\"/></div><div class=\"weaponRange\"><input id=\"weapon_range\" data-entry=\"range\" class=\"weaponInput\" type=\"text\"/></div><div class=\"weaponHardpoints\"><input id=\"weapon_hardpoints\" data-entry=\"hardpoints\" class=\"weaponInput\" type=\"text\"/></div><div class=\"weaponEncumbrance\"><input id=\"weapon_encumbrance\" data-entry=\"encumbrance\" class=\"weaponInput\" type=\"text\"/></div><div class=\"weaponSpecial\"><input id=\"weapon_special\" data-entry=\"special\" class=\"weaponInput\" type=\"text\"/></div><div class=\"weaponAttachment\"><img src=\"img/icon_attachment.png\" width=\"13px\" height=\"auto\"></div></div>",
		'armor': "<div class=\"row armorRow\" data-rowId=\"\"><div class=\"armorName\"><input id=\"armor_name\" data-entry=\"name\" class=\"armorInput\" type=\"text\"/></div><div class=\"armorPage\"><input id=\"armor_page\" data-entry=\"page\" class=\"armorInput\" type=\"text\"/></div><div class=\"armorDefence\"><input id=\"armor_defence\" data-entry=\"defence\" class=\"armorInput\" type=\"text\"/></div><div class=\"armorSoak\"><input id=\"armor_soak\" data-entry=\"soak\" class=\"armorInput\" type=\"text\"/></div><div class=\"armorHardpoints\"><input id=\"armor_hardpoints\" data-entry=\"hardpoints\" class=\"armorInput\" type=\"text\"/></div><div class=\"armorEncumbrance\"><input id=\"armor_encumbrance\" data-entry=\"encumbrance\" class=\"armorInput\" type=\"text\"/></div><div class=\"armorAttachment\"><img src=\"img/icon_attachment.png\" width=\"13px\" height=\"auto\"></div></div>",
		'item': "<div class=\"row itemRow\" data-rowId=\"\"><div class=\"itemName\"><input id=\"item_name\" data-entry=\"name\" class=\"itemInput\" type=\"text\"/></div><div class=\"itemPage\"><input id=\"item_page\" data-entry=\"page\" class=\"itemInput\" type=\"text\"/></div><div class=\"itemQuantity\"><input id=\"item_quantity\" data-entry=\"quantity\" class=\"itemInput\" type=\"text\"/></div><div class=\"itemEncumbrance\"><input id=\"item_encumbrance\" data-entry=\"encumbrance\" class=\"itemInput\" type=\"text\"/></div></div>"
	};

	function displayData() {
		for(var i = 0 in character_sheet) {
			if(i == "character_basic") {
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
							if(iii == 'id') {
								$(rowSelector + ':last-child').data('rowId', character_sheet[i][ii][iii]);
							} else {
								$(rowSelector + ':last-child #' + i + '_' + iii).val(character_sheet[i][ii][iii]);
							}
						}
					}
				}
			}
		}
	}

	function calculateData() {
		//Wound threshold
		var wounds = parseInt($('#wounds_base_threshold').attr('value')) + parseInt($('#brawn').attr('value'));
		$('#wounds_threshold').attr('value', wounds);

		//Strain threshold
		var strain = parseInt($('#strain_base_threshold').attr('value')) + parseInt($('#willpower').attr('value'));
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
				sendCharacterSheet();
			}
		});
	}

	function sendCharacterSheet() {
		var data = {};
		$('[data-section]').each(function() {
			var sectionName = $(this).data('section');
			var rows = $(this).find('[data-rowId]');
			data[sectionName] = {};

			if(rows.length) {
				$(rows).each(function() {
					var rowId = $(this).data('rowId');
					data[sectionName][rowId] = {};
					$(this).find('[data-entry]').each(function() {
						var entryName = $(this).data('entry');
						data[sectionName][rowId][entryName] = $(this).val();
					});
				});
			} else {
				$(this).find('[data-entry]').each(function() {
					var entryName = $(this).data('entry');
					data[sectionName][entryName] = $(this).val();
				});
			}
		});

		console.log("SEND DATA!");
		console.log(data);
	}


	getCharacterSheet();
});