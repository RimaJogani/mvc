<div class="center mt-2">
    <?php  if($success = $this->getMessage()->getSuccess()): $this->getMessage()->clearSuccess() ; ?>
        <div class="alert alert-success" role="alert">
            <p class="mb-0 text-center">
            <?php echo $success; ?>
            </p>
        </div> 
    <?php endif;?>
    <?php if($faliure = $this->getMessage()->getFailure()) : $this->getMessage()->clearFailure(); ?>
        <div class="alert alert-danger" role="alert">
            <p class="mb-0 text-center">
                <?php echo $faliure; ?>
            </p>
        </div> 
    <?php endif; ?>
</div>