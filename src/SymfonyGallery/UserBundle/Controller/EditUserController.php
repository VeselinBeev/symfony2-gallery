<?php

namespace SymfonyGallery\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\Common\Util\Debug as Debug;

/*class UserController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template('')
     */
/*public function updateAction($id, Request $request)
{
    $fos = $this->getDoctrine()
        ->getManager();

    $user = $fos->getRepository('UserBundle:User:update')
        ->find($id);
    if (!$user) {
        throw $this->createNotFoundException(
            'No blog was found for this id' . $id
        );
    }

    $fos = $this->createUser($user)
        ->add($_POST['username'])
        ->add(($_POST['password'])
        ->add($_POST['email'])
        ->getForm();
    $fos->updateUser($user);
   ;
    $fos->handleRequest($request);

    if ($user->isValid()) {
        $fos->flush();

        // return new Response('Blog was updated successfully');
        return $this->redirect($this->generateUrl('::base.html.twig'));
    }

    $build['form'] = fos->createView();

    return $this->render('::base.html.twig', $build);


    echo '<pre>';
    print_r($fos->findUsers());
    echo '</pre>';
    ?>
    <div>

        <form action="/path/web/app_dev.php/Admin/{id}/update"  method="POST" class="fos_user_registration_register">
            <div id="fos_user_registration_form"><div><label for="fos_user_registration_form_email" class="required">Email:</label>
                    <input type="email" id="fos_user_registration_form_email" name="email" required="required" /></div><div>
                    <label for="fos_user_registration_form_username" class="required">Username:</label>
                    <input type="text" id="fos_user_registration_form_username" name="username" required="required" pattern=".{2,}" /></div>
                <div>
                    <label for="fos_user_registration_form_plainPassword_first" class="required">Password:</label>
                    <input type="password" id="fos_user_registration_form_plainPassword_first" name="password" required="required" />
                </div>
                <div>
                    <label for="edit_seper_admin" >Super Admin</label>
                    <input type="checkbox" id="edit_seper_admin" name="is_super_admin" value="1"  />
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
public function editAction()
{
    print_r($_POST);
    $fos = $this->get('fos_user.user_manager');

    $user =$fos->findUsers(2);
    print_r($user);

    if (isset($_POST['username'],$_POST['password'],$_POST['email']))
    {
        $user =$fos->findUsers(2);
        $user->setUsername($_POST['username']);
        $user->setPassword($_POST['password']);
        $user->setEmail($_POST['email']);
        $user->setEnabled(true);
        $user->getLastLogin();
        $fos->updateUser($user);
    }
    echo '<pre>';
    print_r($fos->findUsers());
    echo '</pre>';
    ?>
    <div>

        <form action="/path/web/app_dev.php/Admin/edit"  method="POST" class="fos_user_registration_register">
            <div id="fos_user_registration_form"><div><label for="fos_user_registration_form_email" class="required">Email:</label>
                    <input type="email" id="fos_user_registration_form_email" name="email" required="required" /></div><div>
                    <label for="fos_user_registration_form_username" class="required">Username:</label>
                    <input type="text" id="fos_user_registration_form_username" name="username" required="required" pattern=".{2,}" /></div><div>
                    <label for="fos_user_registration_form_plainPassword_first" class="required">Password:</label>
                    <input type="password" id="fos_user_registration_form_plainPassword_first" name="password" required="required" /></div>
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
*/