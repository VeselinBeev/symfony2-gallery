<?php

namespace SymfonyGallery\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\Common\Util\Debug as Debug;

class UserController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function newAction()
    {
        $fos = $this->get('fos_user.user_manager');

        if (isset($_POST['username'],$_POST['password'],$_POST['email']))
        {
            $user = $fos->createUser();
            $user->setUsername($_POST['username']);
            $user->setPlainPassword($_POST['password']);
            $user->setEmail($_POST['email']);
            $user->setEnabled(true);
            $user->setLastLogin();

            $fos->updateUser($user);
        }
        echo '<pre>';
        print_r($fos->findUsers());
        echo '</pre>';
        ?>
        <div>

            <form action="/path/web/app_dev.php/Admin/Admin_new"  method="POST" class="fos_user_registration_register">
                <div id="fos_user_registration_form"><div><label for="fos_user_registration_form_email" class="required">Email:</label>
                        <input type="email" id="fos_user_registration_form_email" name="email" required="required" /></div><div>
                        <label for="fos_user_registration_form_username" class="required">Username:</label>
                        <input type="text" id="fos_user_registration_form_username" name="username" required="required" pattern=".{2,}" /></div>
                    <div>
                        <label for="fos_user_registration_form_plainPassword_first" class="required">Password:</label>
                        <input type="password" id="fos_user_registration_form_plainPassword_first" name="password" required="required" />
                    </div>
                </div>
                <div>
                    <input type="submit" value="Register" />
                </div>
            </form>
        </div> <?php
        foreach($fos->findUsers() as $user) {
            echo $user->getUsername().' <br /> ';
        }
        exit('ok');
        //return;
    }

}
