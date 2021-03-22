<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(): Response
    {
        $manifestoElements = [
            [
                'title' => 'Learning by doing',
                'icon' => 'ion-ios-flask',
                'description' => "&quot;Tell me and I'll forget&#44; show me and I may remember involve me and I'll understand&#46;&quot; <em>_Confucius</em>"
            ],
            [
                'title' => 'Do It Together',
                'icon' => 'ion-ios-people',
                'description' => "Jerry is not a standardized object. It evolves with the contributions of the authors and actors of its open community. Every gathering is an opportunity to stimulate creativity and exchange knowledge in a Peer-to-Peer manner."
            ],
            [
                'title' => 'Technology is a tool',
                'icon' => 'ion-md-build',
                'description' => "We prefer to create and master our tools instead of being subjected to them. Computers can store, process, receive and transmit information. We use these capacities the way we need &amp; like it to communicate, and solve problems in a creative way."
            ],
            [
                'title' => 'Free software',
                'icon' => 'ion-ios-unlock',
                'description' => "GNU/Linux is created following Hacking Ethic Principles. Both values and organisationnal model inspire us as they bring a new consciousness and resources for our connected world. We promote free as in freedom software."
            ],
            [
                'title' => 'Accessibility',
                'icon' => 'ion-md-checkmark',
                'description' => "To fight digital divide, making information technologies accessible and understandable by everyone is a requirement. Thanks to its superpowers, Jerry can break cultural, social, and economical barriers down."
            ],
            [
                'title' => 'Reuse',
                'icon' => 'ion-md-repeat',
                'description' => "Electronic waste harm both the people and our environment. The biggest part of the overall footprint happens during manufacturing process. We use and resuse electronic hardware as long as we can to limit this negative impact. Let's make value out of the waste around us!"
            ],
            [
                'title' => 'Open knowledge',
                'icon' => 'ion-ios-cog',
                'description' => "Ideas nourrish from other ideas, we want to demonstrate that sharing and exchanging knowledge is far more powerful than keeping it private. Our goal is to facilitate the sharing of knowlegde to empower the community so that people can learn from each others instead of being isolated learners."
            ],
            [
                'title' => 'Distributed networks',
                'icon' => 'ion-ios-paper-plane',
                'description' => "The distribution of the autority on the nodes of a network makes it more resilient."
            ],
            [
                'title' => 'Remix everything',
                'icon' => 'ion-md-git-branch',
                'description' => "Because everything is a remix !"
            ],
            [
                'title' => 'Agility',
                'icon' => 'ion-md-color-wand',
                'description' => "In a complex environment one need to constantly adapt to survive. We encourage grass roots initiatives to rise up and to fall into the promising unkown of making new things! Therefore we prefer flexibility and ad hoc collaboration over planning and hierarchy."
            ],
            [
                'title' => 'Have FUN !',
                'icon' => 'ion-ios-heart',
                'description' => "We enjoy doing what we do when we do it :)"
            ],
        ];

        $questions = [
            [
                'title' => 'What is a server?',
                'answer' => 'A server is basically made of the same components as a computer. We usually call &quot;server&quot; a computer that we interact with remotly through the network in place of a screen and a keyboard. Therefore a server needs to be constantly switched on and connected to the internet to be accessible.'
            ],
            [
                'title' => 'What software can I use?',
                'answer' => 'We encourage you to use any <a href="http://en.wikipedia.org/wiki/Free_software">free software</a> available that suits your needs. Today free softwares cover a large range of use cases. We listed <a href="http://wiki.youandjerrycan.org/doku.php#software">some applications</a> you can install on Jerry. Hope it will inspire you!'
            ],
            [
                'title' => 'Why a jerrycan?',
                'answer' => 'A jerrycan proves to have several advantages : cheap, easy to find, easy to customize, easy to adapt to your components from various size, transportable,... But we don\'t consider that the jerrycan is an immutable aspect of the project. We invite you to remix it!'
            ],
            [
                'title' => 'How long does it takes to build a Jerry?',
                'answer' => 'The right question should be what do you want to achieve with your Jerry and how much energy are you willing to put into the adventure?'
            ],
            [
                'title' => 'How to manage overheating?',
                'answer' => 'A jerrycan might not look like the best solution to cool the heating parts. You will have to worry about heating depending on the context where your Jerry will run and the power of your hardware setup. Different solution are implemented, from air vent for passive cooling to huge fans in the facade. Your immagination is the limit!'
            ],
        ];

        $members = [
            [
                'firstname' => 'Romain',
                'lastname' => 'Chanut',
                'img' => '1516300921229.jpg',
                'jobTitle' => 'Communication Manager'
            ],
            [
                'firstname' => 'Romain',
                'lastname' => 'Chanut',
                'img' => 'person_2.jpg',
                'jobTitle' => 'Communication Manager'
            ],
            [
                'firstname' => 'Romain',
                'lastname' => 'Chanut',
                'img' => 'person_4.jpg',
                'jobTitle' => 'Communication Manager'
            ],
            [
                'firstname' => 'Romain',
                'lastname' => 'Chanut',
                'img' => 'person_3.jpg',
                'jobTitle' => 'Communication Manager'
            ],
        ];

        return $this->render('default/index.html.twig', [
            'manifestoElements' => $manifestoElements,
            'questions' => $questions,
            'members' => $members,
        ]);
    }
}
