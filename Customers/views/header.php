<?php
use App\Services\Auth;
?>
<?php if(isset($hideHeader)) return ?>
<nav>
        <ul>
            <li><a class="active" href="<?= URL ?>">Home</a></li>
            <li><a class="active" href="<?= URL ?>clients/create">Create Account</a></li>
            <li><a class="active" href="<?= URL ?>clients">Clients List</a></li>
            <li><a class="active" href="#">Contact</a></li>
            <li><a class="active" href="#">Feedback</a></li>
            <?php if (Auth::get()->isAuth()) : ?>
                <a><?php Auth::get()->getName() ?></a>
                <a href="<?= URL ?>logout"><button>LogOut</button></a>
            <?php else : ?>
                <a href="<?= URL ?>login"><button>Login</button></a>
            <?php endif ?>
        </ul>
    </nav>