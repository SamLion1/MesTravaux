namespace App\Controller;

use App\Form\InscriptionType; // Correction : Assurez-vous d'importer la bonne classe de formulaire
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
#[Route('/home', name: 'app_home')]
public function form(Request $request): Response
{
// Correction : Utiliser InscriptionType si c'est le nom de votre formulaire
$form = $this->createForm(InscriptionType::class);

$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
// Traiter les données du formulaire ici

// Par exemple, rediriger vers une autre page
return $this->redirectToRoute('app_home');
}

return $this->render('home.html.twig', [
'form' => $form->createView(),
]);
}

#[Route('/home/index', name: 'app_home_index')] // Ajout de la route pour la méthode index
public function index(): Response
{
return $this->render('home/index.html.twig', [
'controller_name' => 'HomeController',
]);
}
}
