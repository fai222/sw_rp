<?php
    session_start();
    session_regenerate_id();
    if($_SESSION['logedin'] !== true) {
        header("Location: php/login.php");
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Star Wars Roleplay Character Sheet</title>
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/foundation.css"/>
        <link rel="stylesheet" href="css/style.css"/>
        <script src="js/vendor/modernizr.js"></script>
    </head>
    <body>
        <div class="wrapper">
            <div class="row container char" data-section="character_basic">
                <div class="large-6 medium-5 small-12 columns charInputContainer">
                    <div class="row">
                        <input id="character_name" data-entry="character_name" class="charInput" type="text"/>
                    </div>
                    <hr/>
                    <div class="row">
                        <p>Species:</p>
                        <input id="species" data-entry="species" class="charInput" type="text"/>
                        <div class="settingsIcon species">
                            <a><img src="img/icon_settings.png" width="100%" height="auto"></a>
                            <div class="speciesSettingsContainer">
                                <div class="row">
                                        <p>Base Wounds Threshold:</p>
                                        <input id="wounds_base_threshold" data-entry="wounds_base_threshold" class="speciesSettingsInput" value="0" type="text"/>
                                </div>
                                <div class="row">
                                    <p>Base Strain Threshold</p>
                                    <input id="strain_base_threshold" data-entry="strain_base_threshold" class="speciesSettingsInput" value="0" type="text"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <p>Career:</p>
                        <input id="career" data-entry="career" class="charInput" type="text"/>
                    </div>
                    <div class="row">
                        <p>Specialization Trees:</p>
                        <input id="specialization_trees" data-entry="specialization_trees" class="charInput" type="text"/>
                    </div>
                    <div class="row">
                        <p>Player Name:</p>
                        <input id="player_name" data-entry="player_name" class="charInput" type="text"/>
                    </div>
                </div>
                <div class="large-4 medium-5 small-12 columns xpContainer">
                    <div class="xpInputContainer row">
                        <div class="small-5 columns">
                            <input id="total_xp" data-entry="total_xp" class="xpInput" maxlength="5" value="0" type="tlf"/>
                            <p>Total XP</p>
                        </div>
                        <div class="small-5 columns">
                            <input id="available_xp" data-entry="available_xp" class="xpInput" maxlength="5" value="0" type="tlf"/>
                            <p>Available XP</p>
                        </div>
                    </div>
                </div>
                <div class="medium-2 columns avatarContainer">
                    <img src="img/avatar.jpg" width="100%" height="auto">
                </div>
            </div>
            
            <div class="row attributesContainer">
                <div class="medium-3 small-6 columns">
                    <div class="container">
                        <div class="row">
                            <div class="medium-12 columns">
                                <h2>Soak Value</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-12 columns">
                                <input id="soak_value" class="attributesInput" value="0" type="text" readonly/>
                                <p>Brawn + Armor</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="medium-3 small-6 columns">
                    <div class="container">
                        <div class="row">
                            <div class="medium-12 columns">
                                <h2>Wounds</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-6 small-6 columns">
                                <input id="wounds_threshold" class="attributesInput" maxlength="2" value="0" type="text" readonly/>
                                <p>Threshold</p>
                            </div>
                            <div class="medium-6 small-6 columns">
                                <input id="wounds_current" data-entry="wounds_current" class="attributesInput" maxlength="2" value="0" type="text"/>
                                <p>Current</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="medium-3 small-6 columns">
                    <div class="container">
                        <div class="row">
                            <div class="medium-12 columns">
                                <h2>Strain</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-6 small-6 columns">
                                <input id="strain_threshold" class="attributesInput" maxlength="2" value="0" type="text" readonly/>
                                <p>Threshold</p>
                            </div>
                            <div class="medium-6 small-6 columns">
                                <input id="strain_current" data-entry="strain_current" class="attributesInput" maxlength="2" value="0" type="text"/>
                                <p>Current</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="medium-3 small-6 columns">
                    <div class="container">
                        <div class="row">
                            <div class="medium-12 columns">
                                <h2>Defense</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-6 small-6 columns">
                                <input id="defence_ranged" class="attributesInput" maxlength="2" value="0" type="text"/>
                                <p>Ranged</p>
                            </div>
                            <div class="medium-6 small-6 columns">
                                <input id="defence_melee" class="attributesInput" maxlength="2" value="0" type="text"/>
                                <p>Melee</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row container criticalContainer">
                <h2>Critical Injury:</h2><input id="critical_injuries" data-entry="critical_injuries" class="critInput" value="None." type="text"/>
            </div>

            <div class="row characteristicsContainer">
                <div class="medium-2 small-4 columns container">
                    <input id="brawn" data-entry="brawn" class="characteristicsInput" maxlength="1" value="0" type="text"/>
                    <h2>Brawn</h2>
                </div>
                <div class="medium-2 small-4 columns container">
                    <input id="agility" data-entry="agility" class="characteristicsInput" maxlength="1" value="0" type="text"/>
                    <h2>Agility</h2>
                </div>
                <div class="medium-2 small-4 columns container">
                    <input id="intellect" data-entry="intellect" class="characteristicsInput" maxlength="1" value="0" type="text"/>
                    <h2>Intellect</h2>
                </div>
                <div class="medium-2 small-4 columns container">
                    <input id="cunning" data-entry="cunning" class="characteristicsInput" maxlength="1" value="0" type="text"/>
                    <h2>Cunning</h2>
                </div>
                <div class="medium-2 small-4 columns container">
                    <input id="willpower" data-entry="willpower" class="characteristicsInput" maxlength="1" value="0" type="text"/>
                    <h2>Willpower</h2>
                </div>
                <div class="medium-2 small-4 columns container">
                    <input id="presence" data-entry="presence" class="characteristicsInput" maxlength="1" value="0" type="text"/>
                    <h2>Presence</h2>
                </div>
            </div>

            <div class="row">
                <div class="medium-3 small-6 columns tabsContainer">
                    <div class="container active">
                        <h2>Skills & Talents</h2>
                    </div>
                </div>
                <div class="medium-3 small-6 columns tabsContainer">
                    <div class="container">
                        <h2>Gear & Items</h2>
                    </div>
                </div>
                <div class="medium-3 small-6 columns tabsContainer">
                    <div class="container">
                        <h2>Backstory</h2>
                    </div>
                </div>
                <div class="medium-3 small-6 columns tabsContainer">
                    <div class="container">
                        <h2>Notes</h2>
                    </div>
                </div>
            </div>

            <div class="row tabContent">
                <div class="medium-12 columns container">
                    <div class="row">
                        <h2>Skills</h2>
                    </div>

                    <div class="row skillContainer" data-section="character_basic">
                        <div class="medium-6 columns skillGeneral">
                            <div class="row header">
                                <div class="skillName"><h3>General Skills</h3></div>
                                <div class="skillCareer"><h3>Career</h3></div>
                                <div class="skillRankContainer"><h3>Rank</h3></div>
                            </div>

                            <div class="row">
                                <div class="skillName"><p>Astrogation (Int)</p></div>
                                <div class="skillCareer">
                                    <input id="astrogation_career" data-entry="astrogation_career" class="skillCareerInput" type="text"/>
                                </div>
                                <input type="hidden" data-entry="astrogation" readonly/>
                                <div class="skillRankContainer" id="astrogation">
                                    <div class="skillRank one"></div>
                                    <div class="skillRank two"></div>
                                    <div class="skillRank three"></div>
                                    <div class="skillRank four"></div>
                                    <div class="skillRank five"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="skillName"><p>Athletics (Br)</p></div>
                                <div class="skillCareer">
                                    <input id="athletics_career" data-entry="athletics_career" class="skillCareerInput" type="text"/>
                                </div>
                                <input type="hidden" data-entry="athletics" readonly/>
                                <div class="skillRankContainer" id="athletics">
                                    <div class="skillRank one"></div>
                                    <div class="skillRank two"></div>
                                    <div class="skillRank three"></div>
                                    <div class="skillRank four"></div>
                                    <div class="skillRank five"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="skillName"><p>Charm (Pr)</p></div>
                                <div class="skillCareer">
                                    <input id="charm_career" data-entry="charm_career" class="skillCareerInput" type="text"/>
                                </div>
                                <input type="hidden" data-entry="charm" readonly/>
                                <div class="skillRankContainer" id="charm">
                                    <div class="skillRank one"></div>
                                    <div class="skillRank two"></div>
                                    <div class="skillRank three"></div>
                                    <div class="skillRank four"></div>
                                    <div class="skillRank five"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="skillName"><p>Coercion (Will)</p></div>
                                <div class="skillCareer">
                                    <input id="coercion_career" data-entry="coercion_career" class="skillCareerInput" type="text"/>
                                </div>
                                <input type="hidden" data-entry="coercion" readonly/>
                                <div class="skillRankContainer" id="coercion">
                                    <div class="skillRank one"></div>
                                    <div class="skillRank two"></div>
                                    <div class="skillRank three"></div>
                                    <div class="skillRank four"></div>
                                    <div class="skillRank five"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="skillName"><p>Computers (Int)</p></div>
                                <div class="skillCareer">
                                    <input id="computers_career" data-entry="computers_career" class="skillCareerInput" type="text"/>
                                </div>
                                <input type="hidden" data-entry="computers" readonly/>
                                <div class="skillRankContainer" id="computers">
                                    <div class="skillRank one"></div>
                                    <div class="skillRank two"></div>
                                    <div class="skillRank three"></div>
                                    <div class="skillRank four"></div>
                                    <div class="skillRank five"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="skillName"><p>Cool (Per)</p></div>
                                <div class="skillCareer">
                                    <input id="cool_career" data-entry="cool_career" class="skillCareerInput" type="text"/>
                                </div>
                                <input type="hidden" data-entry="cool" readonly/>
                                <div class="skillRankContainer" id="cool">
                                    <div class="skillRank one"></div>
                                    <div class="skillRank two"></div>
                                    <div class="skillRank three"></div>
                                    <div class="skillRank four"></div>
                                    <div class="skillRank five"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="skillName"><p>Coordination (Ag)</p></div>
                                <div class="skillCareer">
                                    <input id="coordination_career" data-entry="coordination_career" class="skillCareerInput" type="text"/>
                                </div>
                                <input type="hidden" data-entry="coordination" readonly/>
                                <div class="skillRankContainer" id="coordination">
                                    <div class="skillRank one"></div>
                                    <div class="skillRank two"></div>
                                    <div class="skillRank three"></div>
                                    <div class="skillRank four"></div>
                                    <div class="skillRank five"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="skillName"><p>Deception (Cun)</p></div>
                                <div class="skillCareer">
                                    <input id="deception_career" data-entry="deception_career" class="skillCareerInput" type="text"/>
                                </div>
                                <input type="hidden" data-entry="deception" readonly/>
                                <div class="skillRankContainer" id="deception">
                                    <div class="skillRank one"></div>
                                    <div class="skillRank two"></div>
                                    <div class="skillRank three"></div>
                                    <div class="skillRank four"></div>
                                    <div class="skillRank five"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="skillName"><p>Discipline (Will)</p></div>
                                <div class="skillCareer">
                                    <input id="discipline_career" data-entry="discipline_career" class="skillCareerInput" type="text"/>
                                </div>
                                <input type="hidden" data-entry="discipline" readonly/>
                                <div class="skillRankContainer" id="discipline">
                                    <div class="skillRank one"></div>
                                    <div class="skillRank two"></div>
                                    <div class="skillRank three"></div>
                                    <div class="skillRank four"></div>
                                    <div class="skillRank five"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="skillName"><p>Leadership (Pr)</p></div>
                                <div class="skillCareer">
                                    <input id="leadership_career" data-entry="leadership_career" class="skillCareerInput" type="text"/>
                                </div>
                                <input type="hidden" data-entry="leadership" readonly/>
                                <div class="skillRankContainer" id="leadership">
                                    <div class="skillRank one"></div>
                                    <div class="skillRank two"></div>
                                    <div class="skillRank three"></div>
                                    <div class="skillRank four"></div>
                                    <div class="skillRank five"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="skillName"><p>Mechanics (Int)</p></div>
                                <div class="skillCareer">
                                    <input id="mechanics_career" data-entry="mechanics_career" class="skillCareerInput" type="text"/>
                                </div>
                                <input type="hidden" data-entry="mechanics" readonly/>
                                <div class="skillRankContainer" id="mechanics">
                                    <div class="skillRank one"></div>
                                    <div class="skillRank two"></div>
                                    <div class="skillRank three"></div>
                                    <div class="skillRank four"></div>
                                    <div class="skillRank five"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="skillName"><p>Medicine (Int)</p></div>
                                <div class="skillCareer">
                                    <input id="medicine_career" data-entry="medicine_career" class="skillCareerInput" type="text"/>
                                </div>
                                <input type="hidden" data-entry="medicine" readonly/>
                                <div class="skillRankContainer" id="medicine">
                                    <div class="skillRank one"></div>
                                    <div class="skillRank two"></div>
                                    <div class="skillRank three"></div>
                                    <div class="skillRank four"></div>
                                    <div class="skillRank five"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="skillName"><p>Negotiation (Pr)</p></div>
                                <div class="skillCareer">
                                    <input id="negotiation_career" data-entry="negotiation_career" class="skillCareerInput" type="text"/>
                                </div>
                                <input type="hidden" data-entry="negotiation" readonly/>
                                <div class="skillRankContainer" id="negotiation">
                                    <div class="skillRank one"></div>
                                    <div class="skillRank two"></div>
                                    <div class="skillRank three"></div>
                                    <div class="skillRank four"></div>
                                    <div class="skillRank five"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="skillName"><p>Perception (Cun)</p></div>
                                <div class="skillCareer">
                                    <input id="perception_career" data-entry="perception_career" class="skillCareerInput" type="text"/>
                                </div>
                                <input type="hidden" data-entry="perception" readonly/>
                                <div class="skillRankContainer" id="perception">
                                    <div class="skillRank one"></div>
                                    <div class="skillRank two"></div>
                                    <div class="skillRank three"></div>
                                    <div class="skillRank four"></div>
                                    <div class="skillRank five"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="skillName"><p>Piloting - Planetary (Ag)</p></div>
                                <div class="skillCareer">
                                    <input id="piloting_planetary_career" data-entry="piloting_planetary_career" class="skillCareerInput" type="text"/>
                                </div>
                                <input type="hidden" data-entry="piloting_planetary" readonly/>
                                <div class="skillRankContainer" id="piloting_planetary">
                                    <div class="skillRank one"></div>
                                    <div class="skillRank two"></div>
                                    <div class="skillRank three"></div>
                                    <div class="skillRank four"></div>
                                    <div class="skillRank five"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="skillName"><p>Piloting - Space (Ag)</p></div>
                                <div class="skillCareer">
                                    <input id="piloting_space_career" data-entry="piloting_space_career" class="skillCareerInput" type="text"/>
                                </div>
                                <input type="hidden" data-entry="piloting_space" readonly/>
                                <div class="skillRankContainer" id="piloting_space">
                                    <div class="skillRank one"></div>
                                    <div class="skillRank two"></div>
                                    <div class="skillRank three"></div>
                                    <div class="skillRank four"></div>
                                    <div class="skillRank five"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="skillName"><p>Resilience (Br)</p></div>
                                <div class="skillCareer">
                                    <input id="resilience_career" data-entry="resilience_career" class="skillCareerInput" type="text"/>
                                </div>
                                <input type="hidden" data-entry="resilience" readonly/>
                                <div class="skillRankContainer" id="resilience">
                                    <div class="skillRank one"></div>
                                    <div class="skillRank two"></div>
                                    <div class="skillRank three"></div>
                                    <div class="skillRank four"></div>
                                    <div class="skillRank five"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="skillName"><p>Skulduggery (Cun)</p></div>
                                <div class="skillCareer">
                                    <input id="skulduggery_career" data-entry="skulduggery_career" class="skillCareerInput" type="text"/>
                                </div>
                                <input type="hidden" data-entry="skulduggery" readonly/>
                                <div class="skillRankContainer" id="skulduggery">
                                    <div class="skillRank one"></div>
                                    <div class="skillRank two"></div>
                                    <div class="skillRank three"></div>
                                    <div class="skillRank four"></div>
                                    <div class="skillRank five"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="skillName"><p>Stealth (Ag)</p></div>
                                <div class="skillCareer">
                                    <input id="stealth_career" data-entry="stealth_career" class="skillCareerInput" type="text"/>
                                </div>
                                <input type="hidden" data-entry="stealth" readonly/>
                                <div class="skillRankContainer" id="stealth">
                                    <div class="skillRank one"></div>
                                    <div class="skillRank two"></div>
                                    <div class="skillRank three"></div>
                                    <div class="skillRank four"></div>
                                    <div class="skillRank five"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="skillName"><p>Streetwise (Cun)</p></div>
                                <div class="skillCareer">
                                    <input id="streetwise_career" data-entry="streetwise_career" class="skillCareerInput" type="text"/>
                                </div>
                                <input type="hidden" data-entry="streetwise" readonly/>
                                <div class="skillRankContainer" id="streetwise">
                                    <div class="skillRank one"></div>
                                    <div class="skillRank two"></div>
                                    <div class="skillRank three"></div>
                                    <div class="skillRank four"></div>
                                    <div class="skillRank five"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="skillName"><p>Survival (Ag)</p></div>
                                <div class="skillCareer">
                                    <input id="survival_career" data-entry="survival_career" class="skillCareerInput" type="text"/>
                                </div>
                                <input type="hidden" data-entry="survival" readonly/>
                                <div class="skillRankContainer" id="survival">
                                    <div class="skillRank one"></div>
                                    <div class="skillRank two"></div>
                                    <div class="skillRank three"></div>
                                    <div class="skillRank four"></div>
                                    <div class="skillRank five"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="skillName"><p>Vigilance (Will)</p></div>
                                <div class="skillCareer">
                                    <input id="vigilance_career" data-entry="vigilance_career" class="skillCareerInput" type="text"/>
                                </div>
                                <input type="hidden" data-entry="vigilance" readonly/>
                                <div class="skillRankContainer" id="vigilance">
                                    <div class="skillRank one"></div>
                                    <div class="skillRank two"></div>
                                    <div class="skillRank three"></div>
                                    <div class="skillRank four"></div>
                                    <div class="skillRank five"></div>
                                </div>
                            </div>
                        </div>
                        <div class="medium-6 columns">
                            <div class="row">
                                <div class="medium-12 columns skillCombat">
                                    <div class="row header">
                                        <div class="skillName"><h3>Combat Skills</h3></div>
                                        <div class="skillCareer"><h3>Career</h3></div>
                                        <div class="skillRankContainer"><h3>Rank</h3></div>
                                    </div>
                                    <div class="row">
                                        <div class="skillName"><p>Brawl (Br)</p></div>
                                        <div class="skillCareer">
                                            <input id="brawl_career" data-entry="brawl_career" class="skillCareerInput" type="text"/>
                                        </div>
                                        <input type="hidden" data-entry="brawl" readonly/>
                                        <div class="skillRankContainer" id="brawl">
                                            <div class="skillRank one"></div>
                                            <div class="skillRank two"></div>
                                            <div class="skillRank three"></div>
                                            <div class="skillRank four"></div>
                                            <div class="skillRank five"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="skillName"><p>Gunnery (Ag)</p></div>
                                        <div class="skillCareer">
                                            <input id="gunnery_career" data-entry="gunnery_career" class="skillCareerInput" type="text"/>
                                        </div>
                                        <input type="hidden" data-entry="gunnery" readonly/>
                                        <div class="skillRankContainer" id="gunnery">
                                            <div class="skillRank one"></div>
                                            <div class="skillRank two"></div>
                                            <div class="skillRank three"></div>
                                            <div class="skillRank four"></div>
                                            <div class="skillRank five"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="skillName"><p>Melee (Br)</p></div>
                                        <div class="skillCareer">
                                            <input id="melee_career" data-entry="melee_career" class="skillCareerInput" type="text"/>
                                        </div>
                                        <input type="hidden" data-entry="melee" readonly/>
                                        <div class="skillRankContainer" id="melee">
                                            <div class="skillRank one"></div>
                                            <div class="skillRank two"></div>
                                            <div class="skillRank three"></div>
                                            <div class="skillRank four"></div>
                                            <div class="skillRank five"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="skillName"><p>Ranged - Light (Ag)</p></div>
                                        <div class="skillCareer">
                                            <input id="ranged_light_career" data-entry="ranged_light_career" class="skillCareerInput" type="text"/>
                                        </div>
                                        <input type="hidden" data-entry="ranged_light" readonly/>
                                        <div class="skillRankContainer" id="ranged_light">
                                            <div class="skillRank one"></div>
                                            <div class="skillRank two"></div>
                                            <div class="skillRank three"></div>
                                            <div class="skillRank four"></div>
                                            <div class="skillRank five"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="skillName"><p>Ranged - Heavy (Ag)</p></div>
                                        <div class="skillCareer">
                                            <input id="ranged_heavy_career" data-entry="ranged_heavy_career" class="skillCareerInput" type="text"/>
                                        </div>
                                        <input type="hidden" data-entry="ranged_heavy" readonly/>
                                        <div class="skillRankContainer" id="ranged_heavy">
                                            <div class="skillRank one"></div>
                                            <div class="skillRank two"></div>
                                            <div class="skillRank three"></div>
                                            <div class="skillRank four"></div>
                                            <div class="skillRank five"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="medium-12 columns skillKnowledge">
                                    <div class="row header">
                                        <div class="skillName"><h3>Knowledge Skills</h3></div>
                                        <div class="skillCareer"><h3>Career</h3></div>
                                        <div class="skillRankContainer"><h3>Rank</h3></div>
                                    </div>
                                    <div class="row">
                                        <div class="skillName"><p>Core Worlds (Int)</p></div>
                                        <div class="skillCareer">
                                            <input id="core_worlds_career" data-entry="core_worlds_career" class="skillCareerInput" type="text"/>
                                        </div>
                                        <input type="hidden" data-entry="core_worlds" readonly/>
                                        <div class="skillRankContainer" id="core_worlds">
                                            <div class="skillRank one"></div>
                                            <div class="skillRank two"></div>
                                            <div class="skillRank three"></div>
                                            <div class="skillRank four"></div>
                                            <div class="skillRank five"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="skillName"><p>Education (Int)</p></div>
                                        <div class="skillCareer">
                                            <input id="education_career" data-entry="education_career" class="skillCareerInput" type="text"/>
                                        </div>
                                        <input type="hidden" data-entry="education" readonly/>
                                        <div class="skillRankContainer" id="education">
                                            <div class="skillRank one"></div>
                                            <div class="skillRank two"></div>
                                            <div class="skillRank three"></div>
                                            <div class="skillRank four"></div>
                                            <div class="skillRank five"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="skillName"><p>Lore (Int)</p></div>
                                        <div class="skillCareer">
                                            <input id="lore_career" data-entry="lore_career" class="skillCareerInput" type="text"/>
                                        </div>
                                        <input type="hidden" data-entry="lore" readonly/>
                                        <div class="skillRankContainer" id="lore">
                                            <div class="skillRank one"></div>
                                            <div class="skillRank two"></div>
                                            <div class="skillRank three"></div>
                                            <div class="skillRank four"></div>
                                            <div class="skillRank five"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="skillName"><p>Outer Rim (Int)</p></div>
                                        <div class="skillCareer">
                                            <input id="outer_rim_career" data-entry="outer_rim_career" class="skillCareerInput" type="text"/>
                                        </div>
                                        <input type="hidden" data-entry="outer_rim" readonly/>
                                        <div class="skillRankContainer" id="outer_rim">
                                            <div class="skillRank one"></div>
                                            <div class="skillRank two"></div>
                                            <div class="skillRank three"></div>
                                            <div class="skillRank four"></div>
                                            <div class="skillRank five"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="skillName"><p>Underworld (Int)</p></div>
                                        <div class="skillCareer">
                                            <input id="underworld_career" data-entry="underworld_career" class="skillCareerInput" type="text"/>
                                        </div>
                                        <input type="hidden" data-entry="underworld" readonly/>
                                        <div class="skillRankContainer" id="underworld">
                                            <div class="skillRank one"></div>
                                            <div class="skillRank two"></div>
                                            <div class="skillRank three"></div>
                                            <div class="skillRank four"></div>
                                            <div class="skillRank five"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="skillName"><p>Xenology (Int)</p></div>
                                        <div class="skillCareer">
                                            <input id="xenology_career" data-entry="xenology_career" class="skillCareerInput" type="text"/>
                                        </div>
                                        <input type="hidden" data-entry="xenology" readonly/>
                                        <div class="skillRankContainer" id="xenology">
                                            <div class="skillRank one"></div>
                                            <div class="skillRank two"></div>
                                            <div class="skillRank three"></div>
                                            <div class="skillRank four"></div>
                                            <div class="skillRank five"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="medium-12 columns container">
                    <div class="row">
                        <h2>Talents & Special Abilites</h2>
                    </div>

                    <div class="row talentContainer">
                        <div class="medium-12 columns">
                            <div class="row header">
                                <div class="talentName">
                                    <h3>Name</h3>
                                </div>
                                <div class="talentPage">
                                    <h3>Page</h3>
                                </div>
                                <div class="talentSummary">
                                    <h3>Ability Summary</h3>
                                </div>
                            </div>

                            <div class="talentRowContainer" data-section="talent">
                                <div class="row talentRow">
                                    <input type="hidden" id="talent_id" readonly/>
                                    <div class="talentName">
                                        <input id="talent_name" class="talentInput" type="text"/>
                                    </div>
                                    <div class="talentPage">
                                        <input id="talent_page" class="talentInput" type="text"/>
                                    </div>
                                    <div class="talentSummary">
                                        <input id="talent_summary" class="talentInput" type="text"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="addTalent">
                                    <div class="addTalentButton">+</div>
                                    <p>Add talent / ability</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="medium-12 columns container gear">
                    <div class="row">
                        <div class="small-12 columns">
                            <h2>Gear & Items</h2>
                        </div>
                    </div>

                    <div class="row gearInfoContainer">
                        <div class="medium-6 columns creditsContainer">
                            <h3>Credits:</h3>
                            <input id="credits" class="creditsInput" type="text"/>
                        </div>
                        <div class="medium-6 columns encumbranceContainer">
                            <h3>
                                Encumbrance threshold:
                                <span class="encumbranceThreshold">
                                    11
                                </span>
                                Current: 
                                <span class="encumbranceCurrent underThreshold">
                                    7
                                </span>
                            </h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="medium-12 columns weaponContainer">
                            <div class="row header weaponRow">
                                <div class="weaponName">
                                    <h3>Weapon</h3>
                                </div>
                                <div class="weaponPage">
                                    <h3>Page</h3>
                                </div>
                                <div class="weaponSkill">
                                    <h3>Skill</h3>
                                </div>
                                <div class="weaponDamage">
                                    <h3>Dmg</h3>
                                </div>
                                <div class="weaponCritical">
                                    <h3>Crit</h3>
                                </div>
                                <div class="weaponRange">
                                    <h3>Range</h3>
                                </div>
                                <div class="weaponHardpoints">
                                    <h3>HP</h3>
                                </div>
                                <div class="weaponEncum">
                                    <h3>Encum</h3>
                                </div>
                                <div class="weaponSpecial">
                                    <h3>Special</h3>
                                </div>
                                <div class="weaponAttachment">
                                    
                                </div>
                            </div>

                            <div class="weaponRowContainer" data-section="weapon">
                                <div class="row weaponRow">
                                    <div class="weaponName">
                                        <input id="weapon_name" class="weaponInput" type="text"/>
                                    </div>
                                    <div class="weaponPage">
                                        <input id="weapon_page" class="weaponInput" type="text"/>
                                    </div>
                                    <div class="weaponSkill">
                                        <input id="weapon_skill" class="weaponInput" type="text"/>
                                    </div>
                                    <div class="weaponDamage">
                                        <input id="weapon_damage" class="weaponInput" type="text"/>
                                    </div>
                                    <div class="weaponCritical">
                                        <input id="weapon_critical" class="weaponInput" type="text"/>
                                    </div>
                                    <div class="weaponRange">
                                        <input id="weapon_range" class="weaponInput" type="text"/>
                                    </div>
                                    <div class="weaponHardpoints">
                                        <input id="weapon_hardpoints" class="weaponInput" type="text"/>
                                    </div>
                                    <div class="weaponEncumbrance">
                                        <input id="weapon_encumbrance" class="weaponInput" type="text"/>
                                    </div>
                                    <div class="weaponSpecial">
                                        <input id="weapon_special" class="weaponInput" type="text"/>
                                    </div>
                                    <div class="weaponAttachment">
                                        <img src="img/icon_attachment.png" width="13px" height="auto">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="addWeapon">
                                    <div class="addWeaponButton">+</div>
                                    <p>Add weapon</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="medium-6 small-12 columns armor">
                            <div class="armorContainer">
                                <div class="row header">
                                    <div class="armorName">
                                        <h3>Armor</h3>
                                    </div>
                                    <div class="armorPage">
                                        <h3>Page</h3>
                                    </div>
                                    <div class="armorDefence">
                                        <h3>Def</h3>
                                    </div>
                                    <div class="armorSoak">
                                        <h3>Soak</h3>
                                    </div>
                                    <div class="armorHardpoints">
                                        <h3>HP</h3>
                                    </div>
                                    <div class="armorEncumbrance">
                                        <h3>Encum</h3>
                                    </div>
                                    <div class="armorAttachment">
                                
                                    </div>
                                </div>

                                <div class="armorRowContainer" data-section="armor">
                                    <div class="row armorRow">
                                        <div class="armorName">
                                            <input id="armor_name" class="armorInput" type="text"/>
                                        </div>
                                        <div class="armorPage">
                                            <input id="armor_page" class="armorInput" type="text"/>
                                        </div>
                                        <div class="armorDefence">
                                            <input id="armor_defence" class="armorInput" type="text"/>
                                        </div>
                                        <div class="armorSoak">
                                            <input id="armor_soak" class="armorInput" type="text"/>
                                        </div>
                                        <div class="armorHardpoints">
                                            <input id="armor_hardpoints" class="armorInput" type="text"/>
                                        </div>
                                        <div class="armorEncumbrance">
                                            <input id="armor_encumbrance" class="armorInput" type="text"/>
                                        </div>
                                        <div class="armorAttachment">
                                            <img src="img/icon_attachment.png" width="13px" height="auto">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="addArmor">
                                        <div class="addArmorButton">+</div>
                                        <p>Add Armor</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="medium-6 small-12 columns item">
                            <div class="itemContainer">
                                <div class="row header">
                                    <div class="itemName">
                                        <h3>Item</h3>
                                    </div>
                                    <div class="itemPage">
                                        <h3>Page</h3>
                                    </div>
                                    <div class="itemQuantity">
                                        <h3>Qty</h3>
                                    </div>
                                    <div class="itemSummary">
                                        <h3>Encum</h3>
                                    </div>
                                </div>

                                <div class="itemRowContainer" data-section="item">
                                    <div class="row itemRow">
                                        <div class="itemName">
                                            <input id="item_name" class="itemInput" type="text"/>
                                        </div>
                                        <div class="itemPage">
                                            <input id="item_page" class="itemInput" type="text"/>
                                        </div>
                                        <div class="itemQuantity">
                                            <input id="item_page" class="itemInput" type="text"/>
                                        </div>
                                        <div class="itemSummary">
                                            <input id="item_summary" class="itemInput" type="text"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="addItem">
                                        <div class="addItemButton">+</div>
                                        <p>Add Item</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="medium-12 columns container backstory">
                    <div class="row">
                        <div class="small-12 columns">
                            <h2>Backstory</h2>
                        </div>
                    </div>

                    <div class="row">
                        <div data-section="description" class="medium-8 columns backstoryContainer">
                            <div class="row">
                                <h3>Description & Backstory</h3>
                                <textarea id="description_text" data-entry="text"></textarea>
                            </div>
                        </div>

                        <div class="medium-4 columns obligationContainer" data-section="obligation">
                            <h3>Obligations</h3>
                            <div class="obligationRowContainer">
                                <div class="row obligationRow" data-row="">
                                    <div class="row obligationType">
                                        <h3>Type:</h3>
                                        <input id="obligation_type" data-entry="type" name="obligation_type" class="obligationInput" type="text"/>
                                    </div>
                                    <div class="row obligationPage">
                                        <h3>Page:</h3>
                                        <input id="obligation_page" data-entry="page" name="obligation_page" class="obligationInput" type="text"/>
                                    </div>
                                    <div class="row obligationMagnitude">
                                        <h3>Magnitude:</h3>
                                        <input id="obligation_magnitude" data-entry="magnitude" name="obligation_magnitude" class="obligationInput" type="text"/>
                                    </div>
                                    <div class="row obligationDescription">
                                        <h3>Description:</h3>
                                        <textarea id="obligation_description" data-entry="description"></textarea>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="addObligation">
                                    <div class="addObligationButton">+</div>
                                    <p>Add Obligation</p>
                                </div>
                            </div>
                        </div>
                        <div class="medium-4 columns motivationContainer">
                            <h3>Motivations</h3>
                            <div class="motivationRowContainer">
                                <div class="row motivationRow" data-row="">
                                    <div class="row motivationType">
                                        <h3>Type:</h3>
                                        <input id="motivation_type" data-entry="type" name="motivation_type" class="motivationInput" type="text"/>
                                    </div>
                                    <div class="row motivationDescription">
                                        <h3>Description:</h3>
                                        <textarea id="motivation_description" data-entry="description"></textarea>
                                    </div>
                                    <hr/>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="addMotivation">
                                        <div class="addMotivationButton">+</div>
                                        <p>Add Motivation</p>
                                    </div>
                                </div>
                        </div>
                    </div>
            </div>
        </div>

        <script src="js/vendor/jquery.js"></script>
        <script src="js/foundation.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/script.js"></script>
        <script>
            $(document).foundation();
        </script>
    </body>
</html>
