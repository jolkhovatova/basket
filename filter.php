<?php
$characteristics = $characteristicsRepository->getAll();
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="get">
                <input type="hidden" name="groups" value="<?= $groupsId ?>">
                <input type="hidden" name="page" value="<?= $pageNum ?>">
                <input type="hidden" name="size" value="<?= $pageSize ?>">
                <?php foreach ($characteristics as $characteristic): ?>
                    <?php
                    //достаем масив обьевтов уникальных значений для определенной характер
                    $uniqValues = $prodCharRepository->getUniqByCharacteristicId($characteristic->getId());
                    ?>
                    <?= $characteristic->getName() ?>:
                    <select class="mr-5" name="filter[<?= $characteristic->getCode() ?>]">
                        <option value="">не выбрано</option>
                        <?php foreach ($uniqValues as $uniqValue): ?>
                            <?php $selected = ($productFilter[$characteristic->getCode()] == $uniqValue->getValue())?'selected':'';?>
                            <option <?=$selected?> value="<?= $uniqValue->getValue() ?>"><?= $uniqValue->getValue() ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php endforeach; ?>
                <button class="btn btn-dark">Ok</button>
            </form>
        </div>
    </div>
</div>
