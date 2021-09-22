<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
use Alert;
class TestimonialController extends Controller
{
    //
    public function index(){
        $testimonials = Testimonial::paginate(4);
        return view('pages.admin.testimonial.index',compact('testimonials'));
    }
    
    public function add(){
        return view('pages.admin.testimonial.add');
    }
    public function store(Request $request){
        $testimoni = $request->all();
        $testimoni['foto'] = $request->file('foto')->store(
            'assets/foto','public'
        );
        Testimonial::create($testimoni);
        return redirect('/admin/testimonial');
    }
    public function delete($id){
        $testimoni = Testimonial::find($id);
        $testimoni->delete();
        return redirect('/admin/testimonial');
    }

    
    public function edit($id){
        $testimoni = Testimonial::findOrFail($id);
        return view('pages.admin.testimonial.edit',compact('testimoni'));
    }

    public function update(Request $request, $id)
    {
        //
        $testimoni = $request->all();
        $item = Testimonial::findOrFail($id);
         $item->update($testimoni);
         Alert::success('Data Testimoni Berhasil Diupdate','Data Berhasil diupdate!'); 
        return redirect('/admin/testimonial');
    
    }
}
