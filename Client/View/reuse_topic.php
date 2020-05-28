<legend align="center"><h1>Reuse Topics</h1></legend>
<div align="center">
    <div align="left" class="card shadow mb-4" style="width: 60% !important;">
        <div class="card-body">
            <div class="table-responsive">
                <form method="post">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Topic Description</h6>
                    </div>
                    <div class="card-body">
                        <textarea rows="10" cols="105" name="txtDescriptions"  required><?php echo $topic->status->description ?></textarea>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Topic Requirements</h6>
                    </div>
                    <div class="card-body">
                        <textarea rows="10" cols="105" name="txtRequirements" ><?php echo $topic->status->requirements ?></textarea>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Facilities</h6>
                    </div>
                    <div class="card-body">
                        <textarea rows="10" cols="105" name="txtFacilities" ><?php echo $topic->status->facilities ?></textarea>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Start Date</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" name="txtStartDate" type="date" required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Finish Date</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" name="txtFinishDate" type="date" required>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Term</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" name="txtTerm" value="<?php echo $topic->status->term ?>" type="number">
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Benefits</h6>
                    </div>
                    <div class="card-body">
                        <textarea rows="10" cols="105" name="txtBenefit" ><?php echo $topic->status->benefit ?></textarea>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Number Of People Needed</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" name="txtNumbOfPeople" value="<?php echo $topic->status->number_of_people ?>" type="number">
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">URL</h6>
                    </div>
                    <div class="card-body">
                        <input style="width: 100%" name="txtUrl" value="<?php echo $topic->status->url ?>" type="url">
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Company</h6>
                    </div>
                    <div class="card-body">
                        <select style="width: 100%" name="txtCompanyId"
                            <?php
                            if ($_SESSION['role'] == 'company') {
                                echo 'disabled';
                            }
                            ?>>
                            <?php
                            /* @var $companies Company */
                            foreach ($dataCompany as $companies) {
                                if ($topic->status->company->id == $companies->id){
                                    echo '<option value = "' . $companies->id . '" selected>' . $companies->name . '</option>';
                                }else{
                                    echo '<option value = "' . $companies->id . '">' . $companies->name . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <input type="submit" value="Reuse Topic" name="btnReuse">
                    <input type="reset">
                </form>
            </div>
        </div>
    </div>
</div>
