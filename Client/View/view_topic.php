<legend align="center"><h1>Topics Details</h1></legend>
<div align="center">
    <div align="left" class="card shadow mb-4" style="width: 60% !important;">
        <div class="card-body">
            <div class="table-responsive">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Company Name</h6>
                </div>
                <div class="card-body">
                    <?php echo $topic->status->company->name ?>
                </div>

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Company Address</h6>
                </div>
                <div class="card-body">
                    <?php echo $topic->status->company->address ?>
                </div>

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Topic Description</h6>
                </div>
                <div class="card-body">
                    <?php echo $topic->status->description ?>
                </div>

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Topic Requirements</h6>
                </div>
                <div class="card-body">
                    <?php echo $topic->status->requirements ?>
                </div>

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Facilities Given</h6>
                </div>
                <div class="card-body">
                    <?php echo $topic->status->facilities ?>
                </div>

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Start Date</h6>
                </div>
                <div class="card-body">
                    <?php echo date_format(date_create($topic->status->start_date),'d M Y') ?>
                </div>

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Finish Date</h6>
                </div>
                <div class="card-body">
                    <?php echo date_format(date_create($topic->status->finish_date),'d M Y') ?>
                </div>

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Benefits</h6>
                </div>
                <div class="card-body">
                    <?php echo $topic->status->benefit ?>
                </div>

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Number Of People Needed</h6>
                </div>
                <div class="card-body">
                    <?php echo $topic->status->number_of_people ?>
                </div>

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Contact Person Email</h6>
                </div>
                <div class="card-body">
                    <?php echo $topic->status->company->email ?>
                </div>

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Contact Person Phone Number</h6>
                </div>
                <div class="card-body">
                    <?php echo $topic->status->company->phone ?>
                </div>

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">URL</h6>
                </div>
                <div class="card-body">
                    <a href="<?php echo $topic->status->url ?>"><?php echo $topic->status->url ?></a>
                </div>

            </div>
        </div>
    </div>
</div>