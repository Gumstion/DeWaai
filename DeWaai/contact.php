<?php
include 'includes/header.php';
?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="well well-sm">
                    <form class="form-horizontal" action="" method="post">
                        <fieldset>
                            <legend class="text-center">Contact</legend>

                            <!-- Name input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Naam</label>
                                <div class="col-md-9">
                                    <input id="name" name="naam" type="text" placeholder="Je naam" class="form-control">
                                </div>
                            </div>

                            <!-- Email input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="email">Je email</label>
                                <div class="col-md-9">
                                    <input id="email" name="email" type="text" placeholder="Je email" class="form-control">
                                </div>
                            </div>

                            <!-- Message body -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="message">Je bericht</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="message" name="message" placeholder="Plaats je bericht hier" rows="5"></textarea>
                                </div>
                            </div>

                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
include 'includes/footer.php';
?>