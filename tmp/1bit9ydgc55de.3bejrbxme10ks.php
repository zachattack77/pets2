<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New-Pet</title>
</head>
<body>
<h1>Order a Pet</h1>

<form action="" method="post">

    <label class="col-sm-1 control-label"
    >Pet Name</label>
    <div class="col-sm-3">
        <?php if (isset($invalidName)): ?>
            <p>Please enter a valid name</p>
        <?php endif; ?>
        <input type="text" name="pet-name" <?php if (isset($name)): ?> value="<?= ($name) ?>"<?php endif; ?>>
    </div>

    <label class="col-sm-1 control-label"
           for="pet-color">Pet Color</label>
    <div class="col-sm-3">
        <?php if (isset($invalidColor)): ?>
            <p>Please enter a valid color</p>
        <?php endif; ?>
        <select class="form-control" name="pet-color" id="pet-color">
            <option>-----Select-----</option>
            <?php foreach (($colors?:[]) as $colorOption): ?>
                <option <?php if ($colorOption == $color): ?>selected<?php endif; ?>  value="<?= ($colorOption) ?>" > <?= ($colorOption) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <label class="col-sm-1 control-label">Pet Type</label>
    <div class="col-sm-3">
        <?php if (isset($invalidType)): ?>
            <p>Please enter a valid Type</p>
        <?php endif; ?>
        <input type="text" name="pet-type" <?php if (isset($type)): ?>value="<?= ($type) ?>"<?php endif; ?>>

    </div>

    <button type="submit" name="submit">Submit</button>

</form>

<?php if ($success): ?>
    <h2>Thank you for your order of a <?= ($type) ?> !</h2>
<?php endif; ?>

</body>
</html>