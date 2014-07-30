<?php

namespace SymfonyGallery\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\Common\Util\Debug as Debug;
class EditUserController extends Controller
{
    /**
     * @Route("/hello/{name}")
     *
     */
    public function updateAction($id ,$manager){
            $user = new User();
            $user->setUsername('admin');
            $user->setPlainPassword('admin');
            $user->setEmail('admin@gmail.com');
            $user->setEnabled(true);

            $manager->persist($user);
            $manager->flush();

        ?>
        <div>
<form action="/admin/update/{id}"  method="POST" class="fos_user_profile_edit">
    <div id="fos_user_profile_form"><div><label for="fos_user_profile_form_username" class="required">Username:</label>
            <input type="text" id="fos_user_profile_form_username" name="fos_user_profile_form[username]" required="required"  value="" /></div>
        <div>
            <label for="fos_user_profile_form_email" class="required">Email:</label>
            <input type="email" id="fos_user_profile_form_email" name="fos_user_profile_form[email]" required="required" value=""  /></div>
        <div><label for="fos_user_profile_form_current_password" class="required">Current password:</label>
            <input type="password" id="fos_user_profile_form_current_password" name="fos_user_profile_form[current_password]" required="required" value=""/></div>
        <input type="hidden" id="fos_user_profile_form__token" name="fos_user_profile_form[_token]"  /></div>
    <div>
        <input type="submit" value="Update" />
    </div>
</form>
        </div><?php echo $id;exit;

    }
}
