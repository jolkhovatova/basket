<?php $groups = $groupsRepository->getAll(); ?>
<section class="menu-catalog">
    <div class="row">
        <div class="col-12 d-none d-lg-block   p-3 mb-2 bg-dark text-white">
            <ul class="nav nav-tabs justify-content-center">
                <?php foreach ($groups as $group): ?>
                    <li class="nav-item">
                        <?php $class = ($_GET['groups'] == $group->getId())?'nav-link active':'nav-link';?>
                        <a class ="<?=$class?>" href="/index.php?groups=<?=$group->getId()?>"><?=$group->getName()?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>
