<?php
    include('templates/isPostulationOpen.php');
?>
<!doctype html>
    <html lang="fr">
        <head>
            <title>EPFL-LIPID</title>
            <?php include('templates/head.php'); ?>
        </head>
    <body>
        <div class="page-style">
        <?php include('templates/header.php') ?>

        <form method ="post" action="cible.php" enctype="multipart/form-data">
            <fieldset>
                <!--<legend><span class="number">1</span>Position</legend>-->
                <legend>Position</legend>
                <select name ="job" id="jb" data-required>
                    <option value="menu" <?php echo (!isset($_SESSION['postedForm']['job'])) ? "selected" : ''; ?> disabled>Choose...</option>
                    <option value="laborantinBiologie" <?php echo ($_SESSION['postedForm']['job'] == "laborantinBiologie") ? "selected" : ''; ?>>Semester / Masters Project</option>
                    <option value="laborantinChimie" <?php echo ($_SESSION['postedForm']['job'] == "laborantinChimie") ? "selected" : ''; ?>>Internship</option>
                    <option value="laborantinPhysique" <?php echo ($_SESSION['postedForm']['job'] == "laborantinPhysique") ? "selected" : ''; ?>>Phd</option>
                    <option value="" <?php echo ($_SESSION['postedForm']['job'] == "laborantinPhysique") ? "selected" : ''; ?>>Post Doc.</option>
                </select>
            </fieldset>

            <div id="all" style="display: none;">
                <fieldset>

                    <legend>How did you get to know about the lab?</legend>
                        <fieldset>
                            <input type="checkbox" name="knownReasons[]" value="conferencePaper" id="conferencePaper" <?php echo (is_int(array_search('conferencePaper', $_SESSION['postedForm']['knownReasons']))) ? 'checked="checked"' : ''; ?>><label for="conferencePaper"><span class="ui"></span>Conference paper</label>
                            <input type="checkbox" name="knownReasons[]" value="journalPaper" id="journalPaper" <?php echo (is_int(array_search('conferencePaper', $_SESSION['postedForm']['knownReasons']))) ? 'checked="checked"' : ''; ?>><label for="journalPaper"><span class="ui"></span>Journal paper</label>
                            <input type="checkbox" name="knownReasons[]" value="presentationInEPFL" id="presentationInEPFL" <?php echo (is_int(array_search('conferencePaper', $_SESSION['postedForm']['knownReasons']))) ? 'checked="checked"' : ''; ?>><label for="presentationInEPFL"><span class="ui"></span>Presentation at EPFL</label>
                            <input type="checkbox" name="knownReasons[]" value="presentationOutEPFL" id="presentationOutEPFL" <?php echo (is_int(array_search('conferencePaper', $_SESSION['postedForm']['knownReasons']))) ? 'checked="checked"' : ''; ?>><label for="presentationOutEPFL"><span class="ui"></span>Presentation outside EPFL</label>
                            <input type="checkbox" name="knownReasons[]" value="coursesEPFL" id="coursesEPFL" <?php echo (is_int(array_search('conferencePaper', $_SESSION['postedForm']['knownReasons']))) ? 'checked="checked"' : ''; ?>><label for="coursesEPFL"><span class="ui"></span>EPFL courses</label>
                            <input type="checkbox" name="knownReasons[]" value="websiteEPFL" id="websiteEPFL" <?php echo (is_int(array_search('conferencePaper', $_SESSION['postedForm']['knownReasons']))) ? 'checked="checked"' : ''; ?>><label for="websiteEPFL"><span class="ui"></span>EPFL website</label>
                            <input type="checkbox" name="knownReasons[]" value="other" id="other" <?php echo (is_int(array_search('conferencePaper', $_SESSION['postedForm']['knownReasons']))) ? 'checked="checked"' : ''; ?>><label for="other"><span class="ui"></span>Other</label>
                            <!-- dyn added text input in case of other-->
                        </fieldset>
                        
                        <legend>What is it about the lab that makes you interested in it?</legend>
                        <fieldset>
                            <textarea name="" id="" placeholder="Type...">
                            </textarea>
                        </fieldset>

                        <legend>Is there a specific currently proposed project you would like to work at?</legend>
                        <fieldset>
                                <dl class="radio-list-left">
                                    <dd>
                                        <input type="radio" name="propProjectNo" id="propProjectNo" value="false">
                                        <label for="propProjectNo">No</label>
                                    </dd>
                                    <dd>
                                        <input type="radio" name="propProjectYes" id="propProjectYes" value="true">
                                        <label for="propProjectYes">Yes</label>
                                    </dd>
                                </dl>
                                <!--dyn zone if yes-->
                        </fieldset>

                        <legend>Is there a specific ongoing research you would like to contribute to?</legend>
                        <fieldset>
                                <dl class="radio-list-left">
                                    <dd>
                                        <input type="radio" name="ongoingProjectNo" id="ongoingProjectNo" value="false">
                                        <label for="ongoingProjectNo">No</label>
                                    </dd>
                                    <dd>
                                        <input type="radio" name="ongoingProjectYes" id="ongoingProjectYes" value="true">
                                        <label for="ongoingProjectYes">Yes</label>
                                    </dd>
                                </dl>
                                <!--dyn zone if yes-->
                        </fieldset>
                            
                        <legend>sdf</legend>
                        <fieldset>

                        </fieldset>
                        <fieldset id="files">
                            <legend><span class="number">4</span> Annexes </legend>
                            <p>Merci de joindre tous les fichiers demandés, en respectant les formats (si les formats ne sont pas respectés, les fichiers ne seront pas pris en compte).</p>

                            <label for="photo">Photo passeport <strong>couleur:*</strong></label>
                            <div class="tooltip">
                                <label class="file" title="" id="photoLabel">
                                    <input type="file" name="photo" id="photo" onchange="changeTitleFile(this)" data-required/>
                                </label>
                                <span class="tooltiptext tooltip-right">Formats autorisés: pdf-jpg-jpeg-png</span>
                                <p></p>
                                <section id="formatErrorZone1"></section>
                            </div>
                            <label for="idCard">Copie carte d'indentité / passeport:*</label>
                            <div class="tooltip">
                                <label class="file" title="" id="idCardLabel">
                                    <input type="file" name="idCard" id="idCard" onchange="changeTitleFile(this)" data-required/>
                                </label>
                                <span class="tooltiptext tooltip-right">Formats autorisés: pdf-jpg-jpeg-png</span>
                                <p></p>
                                <section id="formatErrorZone2"></section>
                            </div>
                            <label for="cv">Curriculum Vitae:*</label>
                            <div class="tooltip">
                                <label class="file" title="" id="CVLabel" >
                                    <input type="file" name="cv" id="cv" onchange="changeTitleFile(this)" data-required/>
                                </label>
                                <span class="tooltiptext tooltip-right">Formats autorisés: pdf-jpg-jpeg-png</span>
                                <p></p>
                                <section id="formatErrorZone3"></section>
                            </div>
                            <label for="lettre">Lettre de motivation:*</label>
                            <div class="tooltip">
                                <label class="file" title="" id="lettreLabel" >
                                    <input type="file" name="lettre" id="lettre" onchange="changeTitleFile(this)" data-required/>
                                </label>
                                <span class="tooltiptext tooltip-right">Formats autorisés: pdf-jpg-jpeg-png</span>
                                <p></p>
                                <section id="formatErrorZone4"></section>
                            </div>

                            <label for="certifs1">Certificats, diplômes et bulletins de notes des derniers 3-4 semestres:</label>
                            <table id="newCertifZone">
                                <tr><td>
                                    <div class="tooltip">
                                        <label class="file" title="" id="certifLabel1">
                                            <input type="file" name="certifs1" id="certifs1" onchange="changeTitleFile(this)" />
                                        </label>
                                        <span class="tooltiptext tooltip-right">Formats autorisés: pdf-jpg-jpeg-png</span>
                                        <p></p>
                                        <section id="formatErrorZone7"></section>
                                    </div>
                                </td></tr>
                            </table>
                            <button type ="button" id="addInputFile" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent buttonRight">
                                Ajouter un annexe
                            </button>
                            <div id="polyOnly">
                                <label for="gimch">Attestation de tests d'aptitudes GIM-CH (polymécanicien):</label>
                                <div class="tooltip">
                                    <label class="file" title="" id="gimchLabel" >
                                        <input type="file" name="gimch" id="gimch" onchange="changeTitleFile(this)"/>
                                    </label>
                                    <span class="tooltiptext tooltip-right">Formats autorisés: pdf-jpg-jpeg-png</span>
                                    <p></p>
                                    <section id="formatErrorZone5"></section>
                                </div>
                            </div>
                            <div id="griTest">
                                <label for="griTestInput">Attestation de tests d'aptitudes GRI (informaticien):</label>
                                <div class="tooltip">
                                    <label class="file" title="" id="griTestInputLabel" >
                                        <input type="file" name="griTestInput" id="griTestInput" onchange="changeTitleFile(this)"/>
                                    </label>
                                    <span class="tooltiptext tooltip-right">Formats autorisés: pdf-jpg-jpeg-png</span>
                                    <p></p>
                                    <section id="formatErrorZone6"></section>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div id="condDiv">
                                <input type="checkbox" value="conditionsAcc" id="conditions" data-required/>
                                <label for="conditions" id="condLabel"><span class="ui"></span>Accepter les <a href="conditions.php" target="_blank"> conditions*</a></label>
                                <p></p>
                            </div>
                        </fieldset>
                        <input type="submit" value="Terminer"/>
                    </div>
                </fieldset>
            </div>
        </form>
        <?php
            if ($_SESSION['formError']) {
                echo '<script>showOnFormReturn();</script>';
            }
            require_once('templates/footer.php');
        ?>
    </body>
</html>