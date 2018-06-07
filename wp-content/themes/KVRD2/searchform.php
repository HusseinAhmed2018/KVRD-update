<div class="float-right aroundSocial">

    <div class="socialIcons pr-3 toHide">
        <a href="<?=$Linkedin?>" class="">
            <i class="fab fa-linkedin"></i>
        </a>
        <a href="<?=$instagram?>" class="">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="<?=$twitter?>" >
            <i class="fab fa-twitter"></i>
        </a>
        <a href="<?=$facebook?>" class="">
            <i class="fab fa-facebook-square"></i>
        </a>
    </div>
    <form action="<?=home_url('/'); ?>" method="get" class="position-relative searchForm">
        <input type="text" name="s" placeholder="Search" required>
        <button class="position-absolute">
            <i class="fas fa-search mainColor"></i>
        </button>
    </form>
    <a href="javascript:void(0)" class="mainColor mainHover searchIcon toHide pl-3">
        <i class="fas fa-search"></i>
    </a>
</div>