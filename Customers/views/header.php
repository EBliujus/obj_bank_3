<?php
use App\Services\Auth;
?>
<?php if(isset($hideHeader)) return ?>
<nav>
        <ul>
            <li><a class="active" href="<?= URL ?>">Home</a></li>
            <li><a class="active" href="<?= URL ?>clients/create">Create Account</a></li>
            <li><a class="active" href="<?= URL ?>clients">Clients List</a></li>
            <?php if (Auth::get()->isAuth()) : ?>
                <span><?php Auth::get()->getName() ?></span>
                <form class="logout" action="<?= URL ?>logout" method="post">
                    <button type="submit">LogOut</button>
                </form>
            <?php else : ?>
                <a href="<?= URL ?>login"><button>Login</button></a>
            <?php endif ?>
        </ul>
    </nav>