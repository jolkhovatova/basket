<?php
$characteristics = $characteristicsRepository->getAll();
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="get">
                <?php foreach ($characteristics as $characteristic): ?>
                    <?php $uniqValues = $prodCharRepository->getUniqByCharacteristicId($characteristic->getId()); ?>
                    <?= $characteristic->getName() ?>:
                    <select class="mr-5" name="<?= $characteristic->getCode() ?>">
                        <option value="">не выбрано</option>
                        <?php foreach ($uniqValues as $uniqValue): ?>
                            <option value="<?= $uniqValue->getValue() ?>"><?= $uniqValue->getValue() ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php endforeach; ?>
                <button class="btn btn-dark">отправить</button>
            </form>
        </div>
    </div>
</div>
