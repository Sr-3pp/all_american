<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slides;
use App\Project;
use App\Material;
use App\Calibre;
use App\Finish;
use App\FinishType;
use App\FinishCategory;
use App\Faqs;
use App\Forming;
use App\Skills;
use App\Mills;
use App\MillType;
use App\Gallery;
use App\FinishChart;
use App\PowderCoat;
use App\Patina;
use Storage;
use App\Article;
use App\Newsletter;
use App\Inbox;
use App\Votes;
use App\Models\Testimonial;
use Mail;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        return view('auth/panel');
    }

    public function getSlides(){
        $slides = Slides::all();
        foreach ($slides as $key => $value) {
            $value->extra = json_decode($value->extra);
        }
        return $slides;
    }

    public function saveSlides(Request $r){
        $data = $r->all();
        if ($r->hasFile('archivo')) {
            $data['archivo'] = $r->archivo->store('slides');
        }
        $slide = Slides::create($data);
        $slide->extra = json_decode($slide->extra);
        
        return $slide;
    }

    public function updateCover(Request $r){
        $current = Gallery::where('project_id', $r->project_id)->where('cover', 1)->first();
        $current->cover = 0;
        $current->save();

        $new = Gallery::find($r->id);
        $new->cover = 1;
        $new->save();

        $slides = Gallery::where('project_id', $r->project_id)->get();

        return $slides;
    }

    public function deletePic(Request $r){
        $pic = Gallery::find($r->id);
        if($pic->cover){
            $new = Gallery::where('project_id', $r->project_id)->first();
            $new->cover = 1;
            $new->save();
        }
        Storage::delete($r->archivo);
        $pic->delete();

        $slides = Gallery::where('project_id', $r->project_id)->get();
            return $slides;
    }

    public function saveTestimonial(Request $r){
        $data = $r->all();
        if($r->hasFile('archivo')){
            $data['archivo'] = $r->archivo->store('testimonials');
        }
        $testimonial = Testimonial::create($data);

        return $testimonial;
    }

    public function updateTestimonial(Request $r){
        $data = $r->all();
        $testimonial = Testimonial::find($data['id']);
        if($r->hasFile('archivo')){
            Storage::delete($testimonial->archivo);
            $data['archivo'] = $r->archivo->store('testimonials');
        }

        $testimonial->update($data);

        return $testimonial;
    }

    public function deleteTestimonial(Request $r){
        $id = $r->id;
        $testimonial = Testimonial::find($id);

        Storage::delete($testimonial->archivo);

        $testimonial->delete();

        return 1;

    }

    public function addSlides(Request $r, $id){
        if($r->hasFile('pics')){
            foreach ($r->pics as $key => $p) {
                try {
                    $pic = Gallery::create([
                        'name' => $id,
                        'project_id' => $id,
                        'archivo' => $p->store('projects/'.$id)
                    ]);
                } catch (\Throwable $th) {
                    throw $th;
                }
            }
            $project = Project::find($id);
            return $project->gallery;
        }
    }

    public function updateSlide(Request $r, $id){
        $slide = Slides::find($id);
        $data = $r->all();
        if ($r->hasFile('archivo')) {
            Storage::delete($slide->archivo);
            $data['archivo'] = $r->archivo->store('slides');
        }
        $slide->update($data);
        
        return $slide;

    }

    public function deleteSlide($id){
        $slide = Slides::find($id);
        $slide->delete();

        return 1;
    }

    public function getProjects(){
        $projects = Project::all();
        foreach ($projects as $key => $p) {
            foreach ($p->gallery as $key => $g) {
                if ($g->cover) {
                    $p->cover = $g;
                }
            }

        }
        return $projects;
    }

    public function getCats($key){
        $categories = Category::where('kind', $key)->get();
        return $categories;
    }

    public function updateProject(Request $r, $id){
        $pro = Project::find($id);
        $data = $r->all();

        $pro->update($data);

        return 'saved';
    }

    public function deleteProject($id){
        $project = Project::find($id);
        foreach ($project->gallery as $key => $g) {
            Storage::delete($g->archivo);
        }
        $project->delete();

        return 1;
    }

    public function saveProject(Request $r){
        $data = $r->all();        
        $proy = Project::create($data);

        if($r->hasFile('pics')){
            foreach ($data['pics'] as $key => $pic) {
                if($key == 0){
                    $cover= 1;
                }else{
                    $cover = 0;
                }
                $picture = $pic->store('projects/'.$proy->id);
                $pic = Gallery::create([
                    'project_id' => $proy->id,
                    'cover' => $cover,
                    'archivo' => $picture,
                    'name' => $proy->name
                ]);
            }
        }
        return $this->getProjects();
    }


    public function getCategories(){
        $cats =Category::all();

        return $cats;
    }
    public function saveCat(Request $r){
        $data = $r->all();
        $cat = Category::create($data);

        return $cat;
    }

    public function deleteCat($id){
        $cat = Category::find($id);
        foreach ($cat->mills as $key => $m) {
            Storage::delete($m->svg);
            $m->delete();
        }

        $cat->delete();

        return 1;
    }


    public function saveMaterial(Request $r){
        $data = $r->all();
        if($r->hasFile('img')){
            $data['img'] = $r->img->store('materials');
        }
        
        $material = Material::create($data);
        
        if($r->gauges != 'undefined'){
            foreach (json_decode($r->gauges) as $key => $g) {
                $d = [];
                if($key == 0){
                    if($r->hasFile('archivo')){
                        $archivo = $r->archivo->store('gauges/'.$material->id);
                    }else{
                        $archivo = null;
                    }
                }else{
                    $archivo = null;
                }
                $d['gauge'] = $g[0];
                $d['thick'] = $g[1];
                $d['material_id'] = $material->id;
                $d['archivo'] = $archivo;
                $calibre = Calibre::create($d);
            }
            $material->gauges;
        }
        return $material;
    }

    public function updateMaterial(Request $r, $id){
        $mat = Material::find($id);
        $data = $r->all();
        if ($r->hasFile('img')) {
            Storage::delete($mat->img);
            $data['img'] = $r->img->store('materials');
        }
        $mat->update($data);

        return 'saved';
    }

    public function updateGauge(Request $r){
        $g = Calibre::find($r->id);
        $data = $r->all();

        $g->update($data);

        return 'saved';
    }

    public function removeMaterial($id){
        $mat = Material::find($id);
        Storage::delete($mat->img);
        foreach ($mat->gauges as $key => $g) {
            Storage::delete($g->archivo);
            $g->delete();
        }
        $mat->delete();

        return 1;
    }

    public function removeGauge($id){
        $g = Calibre::find($id);
        $g->delete();
        return 1;
    }

    public function getFinishes(){
        $data = [];
        $categories = [];
        $finishes = FinishCategory::all();
        
        foreach ($finishes as $key => $f) {
            array_push($categories, $f);
            foreach ($f->finishes as $key => $c) {
                foreach ($c->types as $key => $t) {
                    $t->bases = json_decode($t->bases);
                }
            }
        }
        $data['finishes'] = $finishes;
        $data['categories'] = $categories;
        return $data;
    }

    public function saveFinish(Request $r){
        $data = $r->all();

        $dat = [];
        if($r->cat_name != 'null'){
            $dat['name'] = $r->cat_name;
            $dat['description'] = $r->cat_description;
            $cat = FinishCategory::create($dat); 
            $data['finish_category_id'] = $cat->id;
        }

        $finish = Finish::create($data);

        return  $this->getFinishes();
    }

    public function addType(Request $r){
        $data = $r->all();
        if($r->hasFile('archivo')){
            $data['archivo'] = $r->archivo->store('finishes');
        }

        $type = FinishType::create($data);
        $type->bases = json_decode($type->bases);

        return $type;
    }

    public function deleteType($id){
        $type = FinishType::find($id);
        Storage::delete($type->archivo);
        $type->delete();

        return 1;
    }

    public function updateType(Request $r, $id){
        $data = $r->all();
        $type = FinishType::find($id);

        $type->update($data);

        return 1;
    }

    public function deleteFinish($id){
        $f = Finish::find($id);
        foreach ($f->types as $key => $type) {
            Storage::delete($type->archivo);
            $type->delete();
        }
        $f->delete();
        return 1;
    }

    public function deleteFinishCategory($id){
        $f = FinishCategory::find($id);
        foreach ($f->finishes as $key => $finish) {
           foreach($finish->types as $k => $type){
                Storage::delete($type->archivo);
                $type->delete();
           }
           $finish->delete();
        }
        $f->delete();
        return 1;
    }

    public function updateFinishCategory(Request $r, $id){
        $finish = FinishCategory::find($id);
        $data = $r->all();

        $finish->update($data);
        return $this->getFinishes();
    }

    public function updateFinish(Request $r, $id){
        $finish = Finish::find($id);
        $data = $r->all();
        if($r->hasFile('archivo')){
            Storage::delete($finish->archivo);
            $data['archivo'] = $r->archivo->store('/finishes');
        }
        $finish->update($data);
        return $this->getFinishes();
    }
    
    public function saveFaq(Request $r){
        $data = $r->all();
        $faq = Faqs::create($data);

        return $faq;
    }

    public function updateFaq(Request $r, $id){
        $faq = Faqs::find($id);
        $data = $r->all();
        $faq->update($data);

        return 'saved';
    }
    
    public function deleteFaq($id){
        $f = Faqs::find($id);
        $f->delete();
        return 1;
    }
    
    public function getMills(){
        $mills = Mills::all();
        foreach ($mills as $key => $c) {
            $c->mills;
        }

        return $mills;
    }

    public function saveMill(Request $r){
        $data = $r->all();

        $mill = Mills::create($data);

        return $this->getMills();
    }
    public function addMillType(Request $r){
        $data = $r->all();
        if($r->hasFile('svg')){
            $data['svg'] = $r->svg->store('mills');
        }
        $mtype = MillType::create($data);

        return $mtype;
    }

    public function deleteMillType($id){
        $type = MillType::find($id);
        Storage::delete($type->svg);

        $type->delete();

        return 1;
    }
    public function deleteMill($id){
        $m = Mills::find($id);
        Storage::delete($m->svg);
        $m->delete();
        return 1;
    }

    public function updateMill(Request $r, $id){
        $mill = Mills::find($id);
        $data = $r->all();
        if($r->hasFile('svg')){
            Storage::delete($mill->svg);
            $data['svg'] = $r->svg->store('mills');
        }
        $mill->update($data);
        return $this->getMills();
    }
    
    public function saveSkill(Request $r){
        $data = $r->all();
        $skill = Skills::create($data);

        return $skill;
    }
    
    public function deleteSkill($id){
        $s = Skills::find($id);
        $s->delete();
        return 1;
    }

    public function updateSkill(Request $r, $id){
        $skill = Skills::find($id);
        $data = $r->all();
        $skill->update($data);

        return 'saved';
    }

    public function getPaints(){
        $fc = FinishChart::all();
        $pc = PowderCoat::all();
        $p = Patina::all();
        
        if(!$fc->isEmpty()){
            foreach ($fc as $key => $a) {
                $a->attributes = json_decode($a->attributes);
            }
        }
       
        if(!$pc->isEmpty()){
            $colors = [];
            foreach ($pc as $key => $a) {
                $a->attributes = json_decode($a->attributes);
                array_push($colors, $a->name);
            }
            $cols = array_unique($colors);
            $coats = [];
            foreach ($cols as $key => $co) {
                foreach ($pc as $k => $a) {
                    if($a->name == $co){
                        $coats[$co][$k] = $a; 
                    }
                }
            }
        }
        
        if(!$p->isEmpty()){
            $groups = [];
            foreach ($p as $key => $a) {
                $a->attributes = json_decode($a->attributes);
                array_push($groups, $a->name);
            }
            $grps = array_unique($groups);
            $patinas = ['length' => 0];

            foreach ($grps as $key => $co) {
                foreach ($p as $k => $a) {
                    if($a->name == $co){
                        $patinas[$co][$k] = $a; 
                        $patinas['length'] += 1;
                    }
                }
            }
        }
      

        $paints = [
            'finish Chart' => $fc,
            'powder coat' => $coats,
            'patina' => $patinas
        ];

    
        return $paints;
    }

    public function addPaint(Request $r){
        $data = $r->all();
        $attr = json_decode($data['attributes']);
        $cat = $attr->category;
        if ($r->hasFile('archivo')) {
            $attr->archivo = $r->archivo->store('paints/'.$cat);
        }
        $data['attributes'] = json_encode($attr);
        if($cat == 1){
            $model = new FinishChart;
        }else if($cat == 2){
            $model = new PowderCoat;
        }else if ($cat == 3) {
            $model = new Patina;
        }

        $paint = $model->create($data);

        $paint->attributes = json_decode($paint->attributes);

        return $this->getPaints();
    }

    public function updatePaint(Request $r, $id){
        $data = $r->all();
        $attr = json_decode($data['attributes']);
        $cat = $attr->category;
        if ($r->hasFile('archivo')) {
            Storage::delete($attr->archivo);
            $attr->archivo = $r->archivo->store('paints/'.$cat);
        }
        $data['attributes'] = json_encode($attr);
        if($cat == 1){
            $model = FinishChart::find($id);
        }else if($cat == 2){
            $model = PowderCoat::find($id);
        }else if ($cat == 3) {
            $model = Patina::find($id);
        }

        $model->update($data);
        $model->attributes = json_decode($model->attributes);

        return $this->getPaints();

    }

    public function deletePaint(Request $r){
        $data = $r->all();
        $attr = json_decode($data['attributes']);
        $cat = $attr->category;
        if ($r->hasFile('archivo')) {
            Storage::delete($attr->archivo);
            $attr->archivo = $r->archivo->store('paints/'.$cat);
        }
        $data['attributes'] = json_encode($attr);
        if($cat == 1){
            $model = FinishChart::find($data['id']);
        }else if($cat == 2){
            $model = PowderCoat::find($data['id']);
        }else if ($cat == 3) {
            $model = Patina::find($data['id']);
        }

        $model->delete();

        return $this->getPaints(); 
    }

    public function unsuscribe($id){
        $sub = Newsletter::find($id);
        $sub->delete();

        return 1;
    }

    public function getInbox(){
        $inbox = Inbox::all();
        return $inbox;
    }

    public function getVotes(){
        $votes = Votes::all();

        return $votes;
    }

    public function getForms(){
        $forms = Forming::all();
        foreach ($forms as $key => $f) {
            $f->shared;
            $f->object = json_decode($f->object);
        }

        return $forms;
    }
}
