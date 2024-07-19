<?php
namespace App\Http\Controllers;
use App\Models\Categorie;
use App\Models\Categoriep;
use App\Models\Produit;
use App\Http\Requests\CategorieRequest;
use App\Http\Requests\CategoriepRequest;
use App\Http\Requests\ProduitRequest;
use App\Models\Employe;
use App\Http\Requests\CombosRequest;
use App\Models\Combos;
use App\Http\Requests\CartefideliteRequest;
use App\Models\Cartefidelite;
use App\Http\Requests\ModifRequest;
use App\Models\Modif;
use App\Http\Requests\OptionmodifRequest;
use App\Models\Optionmodif;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\FournisseurRequest;
use App\Models\Fournisseur;
use App\Http\Requests\OrdredachatRequest;
use App\Models\Ordredachat;
use App\Http\Requests\BrancheRequest;
use App\Models\Branche;
use App\Http\Requests\ReductionRequest;
use App\Models\Reduction;
use Illuminate\Http\Request;
use App\Models\Article_fournisseur;
class CompteRestaurantController extends Controller
{ 
    public function storep(CategoriepRequest $request)
    {
        $validatedData = $request->validate([
            'Nom' => 'required|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg', // Accepter plusieurs formats d'image
            'Référence' => 'required|string|max:255',
        ]);
    
        if ($request->hasFile('photo')) {
        $fileName = time() . '_' . $request->file('photo')->getClientOriginalName(); // Utiliser un nom de fichier unique
        $path = $request->file('photo')->storeAs('images', $fileName, 'public');
    } else {
        $path = 'images/grey.jpeg';
    }
        $categorie = new Categoriep();
        $categorie->Nom = $validatedData['Nom'];
        $categorie->Référence = $validatedData['Référence'];
        $categorie->photo = '/storage/' . $path;
        $categorie->save();
    
        return redirect('/nouveaucategoriep');
    }
    
    public function indexp()
    {
        $details = Employe::where('Rôle', 'admin')->first();
        $categoriesp = Categoriep::all();
        $deletedcatp = Categoriep::onlyTrashed()->get();
        $touscatp = Categoriep::whereNull('deleted_at')->get();
        return view('admin.categoriep', compact('categoriesp','details','deletedcatp','touscatp'));
    }
    
    public function store(CategorieRequest $request)
    {
        // Validation des données de la requête
        $request->validate([
            'Nom' => 'required|string', 
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg', // Validation pour s'assurer que le fichier est une image PNG
            'Référence' => 'required|string|max:255',
            'Categoriep' => 'required|string', // Ajout d'une validation pour le nom de la catégorie parente
        ]); 
    
        // Récupération du nom de la catégorie parente depuis la requête
        $categorieNom = $request->input('Categoriep');
    
        // Recherche de la catégorie parente par son nom
        $categorieP = Categoriep::where('Nom', $categorieNom)->first();
    
            $fileName = time() . $request->file('photo')->getClientOriginalName();
            // Enregistrez le fichier photo dans le répertoire de stockage
            $path = $request->file('photo')->storeAs('images', $fileName, 'public');
           // Création de la nouvelle catégorie avec la catégorie parente
            $categorie = new Categorie();
            $categorie->Nom = $request->input('Nom');
            $categorie->Référence = $request->input('Référence');
            $categorie->photo = '/storage/' . $path;
            $categorie->categoriep_id = $categorieP->id;
            $categorie->save();
    
            return redirect('/nouveaucategorie')->with('success', 'Catégorie ajoutée avec succès');

    }
    
    
        
    
    public function index()
    { 
        $categoriesp = Categoriep::all();
        $categories = Categorie::withTrashed()->get();
        $deletedcat = Categorie::onlyTrashed()->with(['categoriesp' => function ($query) {
            $query->withTrashed();
        }])->get();
        $touscat = Categorie::whereNull('deleted_at')->get();
    return view ('admin.categorie', compact('categories','categoriesp','deletedcat','touscat'));
    }
    public function creeproduit()
    {      $produits = produit::withTrashed()->get();
        $categories = Categorie::withTrashed()->get();
           $categoriesp = Categoriep::all();
    return view ('admin.produit', compact('produits','categoriesp','categories'));
    }

    public function ajout(ProduitRequest $request)
{
    $validatedData = $request->validated();
   
        $category = categorie::where('Nom', $validatedData['Categorie'])->firstOrFail();

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('public/images'); 
            $photoPath = str_replace('public/', 'storage/', $photoPath);  
        } else {
            $photoPath = 'storage/images/grey.jpeg';
        }
        $validatedData['photo'] = $photoPath;
        $produit = new Produit($validatedData);
        $produit->categorie()->associate($category);
        $produit->save();
        return redirect('/nouveauproduit')->with('flash_message', 'Produit ajouté avec succès');

    }


    
    public function indexx()
    {    $categoriesp = Categoriep::all();
       $produits = produit::withTrashed()->get();
    $categories = Categorie::all();
    $inactifProduits= produit::query()->where('status','Inactif')->get();
    $actifProduits= produit::query()->where('status','Actif')->get();
    $deletedProduit = produit::onlyTrashed()->get();
    $tousProduit = produit::whereNull('deleted_at')->get();
    return view ('admin.produit', compact('produits','categoriesp','categories','inactifProduits','actifProduits','deletedProduit','tousProduit'));
    }
    public function affich($produitId)
    { 
        $categories = categorie::all();
        $categoriesp = Categoriep::all();
    $produit = Produit::findOrFail((int)$produitId);
    return view('admin.detailproduit', compact('produit','categoriesp','categories'));
    }




    public function detailproduit($produitId)
    {       
        $produit = Produit::withTrashed()->findOrFail((int)$produitId);
        $categories = Categorie::all();
        return view('admin.menu.detailproduit', compact('produit','categories'));
    }
    public function modifproduit(ProduitRequest $request, $id)
    {
        $validatedData = $request->validated();
        $produit = produit::findOrFail($id);
        
    
          // Handle file upload
          if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('public/images');
            $photoPath = str_replace('public/', 'storage/', $photoPath); // Adjust path for public access
            $validatedData['photo'] = $photoPath;
        } 
        $produit->update($validatedData);
    
        // Retrieve the category by its name and associate it with the product
        if (isset($validatedData['Categorie'])) {
            $category = Categorie::where('Nom', $validatedData['Categorie'])->firstOrFail();
            $produit->categorie()->associate($category);
        }
        $produit->save();
        $categories = Categorie::all();
        return view('admin.menu.detailproduit', compact('produit','categories'));
    }
    public function updateStatus ($id)
    {
        $produit = Produit::findOrFail($id);
      
    if ($produit->status == 'Actif') {
        $produit->status = 'Inactif';
    } elseif ($produit->status == 'Inactif') {
        $produit->status = 'Actif';
    }
        $produit->save();
        $categories = Categorie::all();
        return view('admin.menu.detailproduit', compact('produit','categories'));
    }
    public function supproduit($id)
    {
        $produit = produit::findOrFail($id);
        $produit->delete();
        $categories = Categorie::all();
        return view('admin.menu.detailproduit', compact('produit','categories'));
    }
    public function restaureproduit($id)
    {
        $produit = Produit::withTrashed()->findOrFail($id);
    
        // Check if the related Categorie is deleted
        $categorie = Categorie::withTrashed()->find($produit->categorie_id);
    
        if ($categorie && $categorie->trashed()) {
            return redirect()->back()->with('error', 'Cannot restore product because the related category is deleted.');
        }
    
        $produit->restore();
        $categories = Categorie::all();
    
        return view('admin.menu.detailproduit', compact('produit', 'categories'));
    }
    
    












    

    public function ajoutcombos(CombosRequest $request)
    {
               
        $categorieName = $request['categorie'];
         $category = Categorie::where('Nom', $categorieName)->firstOrFail();
         $categorieId = $category->id; 
         $request['categorie_id'] = $categorieId;

         if ($request->hasFile('photo')) {
         $fileName=time().$request->file('photo')->getClientOriginalName();
         $path=$request->file('photo')->storeAs ('images',$fileName,'public');
         $requestData=$request->all();
         $requestData["photo"]='/storage/'.$path;
         }
         else {
            $requestData["photo"]= '/storage/images/grey.jpeg' ;
         }
        Combos::create([
            'nom' =>$request->input('nom'), 
            'photo' => $requestData["photo"],
            'sku' => $request->input('sku'), 
            'categorie_id' =>$request->input('categorie_id'), 
            'code_barre' =>$request->input('code_barre','___'), 
            'description' => $request->input('description','___'), 
        ]);
    
        return redirect('/nouvelcombos');
    } 

    public function affichcombos(){
        $Combos= Combos::withTrashed()->get();
        $categories = Categorie::all();
        return view ('admin.menu.combos', compact('Combos','categories'));  
    }
    public function detailcombos($comboId)
    { 
        $categories = Categorie::all();
        $Combos = Combos::withTrashed()->findOrFail((int)$comboId);
        return view('admin.menu.detailcombos', compact('Combos','categories'));
    }
    public function modifcombos(CombosRequest $request, $id)
    { 
        $validatedData = $request->validated();
        $Combos = combos::findOrFail($id);
        $Combos->update([
            'nom' => $request->input('nom'),
            'sku' => $request->input('sku'),
            'code_barre'=>$request->input('code_barre'),
            'description' =>$request->input('description'),
            'Categorie' =>$request->input('categories'),           
        ]);
    
        if ($request->hasFile('photo')) {
            $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('images', $fileName, 'public');
            $photoPath = '/storage/' . $path;
            $Combos->photo = $photoPath;
            $Combos->update();
        } 
        $categories = Categorie::all();
        return view('admin.menu.detailcombos', compact('Combos','categories'));
    }

    public function supcombos($id)
{
    $Combos = Combos::findOrFail($id);
    $Combos->delete();
    $categories = Categorie::all();
    return view('admin.menu.detailcombos', compact('Combos','categories'));
}
public function restaurecombos($id)
{
    $Combos = combos::withTrashed()->findOrFail($id);
    
        // Check if the related Categorie is deleted
        $categorie = Categorie::withTrashed()->find($Combos->categorie_id);
    
        if ($categorie && $categorie->trashed()) {
            return redirect()->back()->with('error', 'Cannot restore combos because the related category is deleted.');
        }
    
        $Combos->restore();
        $categories = Categorie::all();
    
        return view('admin.menu.detailcombos', compact('Combos','categories'));
    }
    
public function Statuscombos ($id)
{
    $Combos = combos::findOrFail($id);
  
if ($Combos->status == 'Actif') {
    $Combos->status = 'Inactif';
} elseif ($Combos->status == 'Inactif') {
    $Combos->status = 'Actif';
}
    $Combos->save();
    $categories = Categorie::all();
    return redirect()->back();//('compte_restaurant.menu.detailcombos', compact('Combos','categories'));
}









public function ajoutcarte(CartefideliteRequest $request)
{
    $validatedData = $request->validated();
    $category = Categorie::where('Nom', $validatedData['Catégorie'])->firstOrFail(); 
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('public/images'); 
        $photoPath = str_replace('public/', 'storage/', $photoPath);  
    } else {
        $photoPath = 'storage/images/grey.jpeg';
    }
    $validatedData['photo'] = $photoPath;
  $Cartefidelites = new cartefidelite($validatedData);
    $Cartefidelites->category()->associate($category);
    $Cartefidelites->save();

    return  redirect('/nouvelcarte');
}
public function affichcarte()
{ 
    $Cartefidelites = Cartefidelite::withTrashed()->get();
    $categories = Categorie::all();

    $inactifCarte= Cartefidelite::query()->where('status','Inactif')->get();
    $actifCarte= Cartefidelite::query()->where('status','Actif')->get();
    $deletedCarte = Cartefidelite::onlyTrashed()->get();
    $touscarte = Cartefidelite::whereNull('deleted_at')->get();

return view ('admin.menu.cartecadeau', compact('Cartefidelites','categories','inactifCarte','actifCarte','deletedCarte','touscarte' ));
}
public function detailcarte($carteId)
{    $categories = Categorie::all();    
    $carte = Cartefidelite::withTrashed()->findOrFail((int)$carteId);
    return view('admin.menu.detailcarte', compact('carte','categories'));
}
public function supcarte($id)
{
    $carte = Cartefidelite::findOrFail($id);
    $carte->delete();
    $categories = Categorie::all();
    return view('admin.menu.detailcarte', compact('carte','categories'));
}
public function Statuscarte ($id)
{
    $carte = Cartefidelite::findOrFail($id);
  
if ($carte->status == 'Actif') {
    $carte->status = 'Inactif';
} elseif ($carte->status == 'Inactif') {
    $carte->status = 'Actif';
}
    $carte->save();
    $categories = Categorie::all();
    return view('admin.menu.detailcarte', compact('carte','categories'));
}
public function restaurecarte($id)
{
    $carte = Cartefidelite::withTrashed()->findOrFail($id);
    
    // Check if the related Categorie is deleted
    $categorie = Categorie::withTrashed()->find($carte->categorie_id);

    if ($categorie && $categorie->trashed()) {
        return redirect()->back()->with('error', 'Cannot restore combos because the related category is deleted.');
    }

$carte->restore();
$categories = Categorie::all();
return view('admin.menu.detailcarte', compact('carte','categories'));
}

public function modifcarte (CartefideliteRequest $request, $id)
{
$validatedData = $request->validated();
$carte = Cartefidelite::findOrFail($id);

  // Handle file upload
  if ($request->hasFile('photo')) {
    $photoPath = $request->file('photo')->store('public/images');
    $photoPath = str_replace('public/', 'storage/', $photoPath); // Adjust path for public access
    $validatedData['photo'] = $photoPath;
} 
$carte->update($validatedData);

// Retrieve the category by its name and associate it with the product
if (isset($validatedData['Catégorie'])) {
    $category = Categorie::where('Nom', $validatedData['Catégorie'])->firstOrFail();
    $carte->category()->associate($category);
}
$carte->save();
$categories = Categorie::all();
return view('admin.menu.detailcarte', compact('carte','categories'));
}









public function   ajoutmodif(ModifRequest $request)
{      
    $modif = modif::create($request->all());
    
    return redirect()->route('modif.affich');
}
public function affichemodif (){
    $modif= modif::withTrashed()->get();
    $deletedmodif = modif::onlyTrashed()->get();
    $tousmodif = modif::whereNull('deleted_at')->get();
    return view ('admin.menu.modificateurs', compact('modif','deletedmodif','tousmodif'));  
}

public function restoremodif($id)
{
$modif = modif::withTrashed()->findOrFail($id);
$modif->restore();
return redirect()->back()->with('success', 'Category restored successfully.');
}


public function modifmodif(ModifRequest$request, $id)
{ 

$validatedData = $request->validated();
$modif = modif::findOrFail($id);

$modif->update($validatedData);
$modif->save();
return redirect('/nouvelmodif');
}
public function effacemodif($id)
{
    $modif = modif::findOrFail($id);
    $modif->delete();
    return redirect()->back()->with('success', 'Category restored successfully.');
}






public function   ajoutoption(optionmodifRequest $request)
{
    $validatedData = $request->validated();

    $modifid = modif::where('Nom', $validatedData['modificateur'])->firstOrFail();

    $optionmodif = new optionmodif($validatedData);
    $optionmodif->modify()->associate($modifid);
    $optionmodif->save();
        
    return redirect()->route('optionmodif.affich');
}
public function afficheoption (){
    $optionmodif= optionmodif::withTrashed()->get();
    $modif= modif::all();
    $actifOption= optionmodif::query()->where('statut','Actif')->get();
    $inactifOption= optionmodif::query()->where('statut','Inactif')->get();
    $deletedOptions = optionmodif::onlyTrashed()->get();
    $tousOptions = optionmodif::whereNull('deleted_at')->get();
    return view ('admin.menu.optionmodificateur', compact('optionmodif','modif','actifOption','inactifOption','deletedOptions','tousOptions'));  
}
public function detailoption($Id)
{       
    $option= optionmodif::withTrashed()->findOrFail((int)$Id);
    $modif= modif::all();
    return view('admin.menu.detailoption', compact('option','modif'));
}

public function modifoption(optionmodifRequest $request, $id)
{
    $validatedData = $request->validated();
    $option = optionmodif::findOrFail($id);
    

    $option->update($validatedData);
    // Retrieve the category by its name and associate it with the product
    if (isset($validatedData['modificateur'])) {
        $modifid = modif::where('Nom', $validatedData['modificateur'])->firstOrFail();
        $option->modify()->associate($modifid);
    }
    $option->save();
    $modif= modif::all();
    return view('admin.menu.detailoption', compact('option','modif'));
}
public function Statusoption ($id)
{
$option = optionmodif::findOrFail($id); 
if ($option->statut == 'Actif') {
$option->statut = 'Inactif';
} elseif ($option->statut == 'Inactif') {
$option->statut = 'Actif';
}
$option->save();
$modif= modif::all();
return view('admin.menu.detailoption', compact('option','modif'));
}
public function supoption($id)
{
$option = optionmodif::findOrFail($id);
$option->delete();
$modif= modif::all();
return view('admin.menu.detailoption', compact('option','modif'));
}
public function restaureoption($id)
{
$option = optionmodif::withTrashed()->findOrFail($id);
$option->restore();
$modif= modif::all();
return view('admin.menu.detailoption', compact('option','modif'));
}



public function delete($id)
{
    $categorie = Categorie::findOrFail($id);
    $categorie->produits()->delete(); // Soft delete related products
    $categorie->delete();
    return redirect()->back()->with('success', 'Category soft deleted successfully.');
}


public function restore($id)
{
$category = Categorie::withTrashed()->findOrFail($id);
$category->restore();
return redirect()->back()->with('success', 'Category restored successfully.');
}


public function modifier(CategorieRequest $request, $id)
{ 
$request->validate([
    'Nom' => 'required|string',
    'Référence' => 'required|string',
    'photo' => 'image|mimes:jpeg,png,gif|max:2048',
]);  
$categorie = Categorie::findOrFail($id);

$categorie->update([
    'Nom' => $request->input('Nom'),
    'Référence' => $request->input('Référence'),
]);

if ($request->hasFile('photo')) {
    $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
    $path = $request->file('photo')->storeAs('images', $fileName, 'public');
    $photoPath = '/storage/' . $path;
    $categorie->photo = $photoPath;
    $categorie->update();
}
return redirect('/nouveaucategorie');
}






public function deletecp($id)
{
    $categoriesp = Categoriep::findOrFail($id);
    $categoriesp->delete();
    return redirect()->back()->with('success', 'Category soft deleted successfully.');
}


public function restorecp($id)
{
    $categoriesp = Categoriep::withTrashed()->findOrFail($id);
$categoriesp->restore();
return redirect()->back()->with('success', 'Category restored successfully.');
}


public function modifiercp(CategoriepRequest $request, $id)
{ 
$request->validate([
    'Nom' => 'required|string|unique:categoriesp',
    'photo'=> 'image',
    'Référence' => 'required|string|max:255', 
]);  
$categoriesp = Categoriep::findOrFail($id);

$categoriesp->update([
    'Nom' => $request->input('Nom'),
    'Référence' => $request->input('Référence'),
]);

if ($request->hasFile('photo')) {
    $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
    $path = $request->file('photo')->storeAs('images', $fileName, 'public');
    $photoPath = '/storage/' . $path;
    $categoriesp->photo = $photoPath;
    $categoriesp->update();
}
return redirect('/nouveaucategoriep');
}








public function ajoutarticle(ArticleRequest $request)
{ $article = Article::create($request->all());

    return redirect('/articleaffich');
}

public function afficharticle()
{ $articles = article::all();
$categories = Categorie::all();

$deletedArticle = article::onlyTrashed()->get();
$tousArticle = article::whereNull('deleted_at')->get();
    return view ('admin.inventaire.article', compact('articles','categories','deletedArticle','tousArticle'));
}
public function detailarticle($articleId)
{       
    $article = Article::withTrashed()->findOrFail((int)$articleId);
    $categories = Categorie::all();
    return view('admin.inventaire.detailarticle', compact('article','categories'));
}
public function modifarticle(ArticleRequest $request, $id)
{
    $validatedData = $request->validated();
    $article = Article::findOrFail($id);
    

    $article->update($validatedData);

    $article->save();
    $categories = Categorie::all();
    return view('admin.inventaire.detailarticle', compact('article','categories'));
}
public function suparticle($id)
{
    $article = Article::findOrFail($id);
$article->delete();
$categories = Categorie::all();
return view('admin.inventaire.detailarticle', compact('article','categories'));
}
public function restaurearticle($id)
{
    $article = Article::withTrashed()->findOrFail($id);
$article->restore();
$categories = Categorie::all();
return view('admin.inventaire.detailarticle', compact('article','categories'));
}









public function ajoutfournisseur(FournisseurRequest $request)
{
    $fournisseur = Fournisseur::create($request->all());       
    return redirect('/nouvelfournisseur');
}
public function affichfournisseur(){
    $fournisseurs = fournisseur::withTrashed()->get();
    $deletedfournisseur = fournisseur::onlyTrashed()->get();
$tousfournisseur = fournisseur::whereNull('deleted_at')->get();
    return view ('admin.inventaire.fournisseur', compact('fournisseurs','deletedfournisseur','tousfournisseur'));  
}

public function show($id)
{
$fournisseur = Fournisseur::withTrashed()->findOrFail($id);
$articles = article::all();
return view('admin.inventaire.detailfournisseur', compact('fournisseur','articles'));
}

public function modiffourni(FournisseurRequest $request, $id)
{ 
$validatedData = $request->validated();
$fournisseur = Fournisseur::findOrFail($id);
$fournisseur->update([
    'Nom' => $request->input('Nom'),
    'Code' => $request->input('Code'),
    'Nom_contact'=>$request->input('Nom_contact'),
    'numero_de_téléphone' =>$request->input('numero_de_téléphone'),
    'Email_secondaire' =>$request->input('Email_secondaire'),         
]);
$articles = article::all();
return view('admin.inventaire.detailfournisseur', compact('fournisseur','articles'));
}
public function supfourni($id)
{
$fournisseur = Fournisseur::findOrFail($id);
$fournisseur->delete();
return view('admin.inventaire.detailfournisseur', compact('fournisseur'));
}
public function restaurefourni($id)
{
$fournisseur = Fournisseur::withTrashed()->findOrFail($id);
$fournisseur->restore();
return view('admin.inventaire.detailfournisseur', compact('fournisseur'));
}













public function ajoutordre(OrdredachatRequest $request)
{
    $Ordredachat = Ordredachat::create($request->all());       
    return redirect('/nouvelordre');   
}
public function affichordre(){
    $Ordredachats= Ordredachat::all();
    $fournisseurs = Fournisseur::all();
    return view ('admin.inventaire.ordresdachat', compact('Ordredachats','fournisseurs'));  
}



public function ajoutbranche(BrancheRequest $request)
{
    $branche = branche::create($request->all());       
    return redirect('/nouvelbranche');
}
public function affichebranche (){
    $branches= branche::all();
    // $deletedbranche= branche::onlyTrashed()->get();
    // $tousbranche = branche::whereNull('deleted_at')->get();
    return view ('admin.mange.branche', compact('branches'));  
}
public function detailbranche($Id)
{       
    $branche = branche::withTrashed()->findOrFail((int)$Id);

    return view('admin.mange.detailbranche', compact('branche'));
}
public function modifbranche(BrancheRequest $request, $id)
{ 
    $validatedData = $request->validated();
    $branche = branche::findOrFail($id);
    $branche->update($validatedData);



    return view('admin.mange.detailbranche', compact('branche'));
}







public function ajoutreduction(ReductionRequest $request)
{
    $reduction = reduction::create($request->all());       
    return redirect('/nouvelreduction');
}
public function affichereduction (){
    $reduction = reduction::all();
    $deletedReduction = reduction::onlyTrashed()->get();
    $tousReduction= reduction::whereNull('deleted_at')->get();
    return view ('admin.mange.reduction', compact('reduction','deletedReduction','tousReduction'));  
}
public function detailreduction($reductionId)
{       
    $reduction = reduction::withTrashed()->findOrFail((int)$reductionId);
    $categories = Categorie::all();
    return view('admin.mange.detailreduction', compact('reduction','categories'));
}
public function modifreduction(ReductionRequest $request, $id)
{
    $validatedData = $request->validated();
    $reduction = reduction::findOrFail($id);
    $reduction->update($validatedData);
    $categories = Categorie::all();
    return view('admin.mange.detailreduction', compact('reduction','categories'));
}
public function supreduction($id)
{
    $reduction = reduction::findOrFail($id);
$reduction->delete();
$categories = Categorie::all();
return view('admin.mange.detailreduction', compact('reduction','categories'));
}
public function restaurereduction($id)
{
    $reduction = reduction::withTrashed()->findOrFail($id);
$reduction->restore();
$categories = Categorie::all();
return view('admin.mange.detailreduction', compact('reduction','categories'));
}





public function ajoutFourniArticle(Request $request, $fournisseurId)
{
    // Retrieve the fournisseur using the ID
    $fournisseur = Fournisseur::findOrFail($fournisseurId);

    // Get the list of article IDs from the form
    $articleIds = $request->input('articles', []);

    // Attach the articles to the fournisseur (assuming a many-to-many relationship)
    $fournisseur->articles()->sync($articleIds);
    $fournisseur = Fournisseur::withTrashed()->findOrFail($fournisseurId);
    $articles = article::all();   

    $article_fournisseur = article_fournisseur::all();


    // Redirect back or to a specific route with a success message
    return  view ('admin.inventaire.detailfournisseur', compact('fournisseur','articles','article_fournisseur'));
}




}