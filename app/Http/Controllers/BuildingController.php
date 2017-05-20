<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\User;

use Illuminate\Http\Request;

use App\Http\Requests\BuildingRequest;






use App\Building;



use Datatables;

use Form;

use Html;



class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.building.index');
    }

    public function add()
    {
        //
        return view('website.buildings.add');

        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.building.create');

        
    }

            

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function store(BuildingRequest $request, Building $build)
    {
        //

        $data = [
                    'user_id' => null,
                    'name' => $request->name,
                    'price' => $request->price, 
                    'rent' => $request->rent, 
                    'square' => $request->square, 
                    'type'  => $request->type,
                    'roomNumber'  => $request->roomNumber,
                    'smallDisc' => $request->smallDisc,
                    'largDisc' => $request->largDisc, 
                    'tags' => $request->tags,
                    'lang' => $request->lang, 
                    'lat'=> $request->lat,

                    'codePostalMaroc'=> $request->codePostalMaroc,
                
                ];


        if($request->from == 'dashboard' && Auth::check() || $request->from == 'website' ){

                if($request->file('img')){



                    $ext = $request->file('img')->getClientOriginalExtension();

                    $fileName = $request->file('img')->getClientOriginalName();

                    if(!file_exists( base_path().'/public/images/'.$fileName )){

                        $request->file('img')->move( 
                            base_path().'/public/images/', $fileName
                        );

                    }

                    list($widthIMG, $heightIMG) = getimagesize(base_path().'/public/images/' . $fileName);

                    resizeIMG( base_path().'/public/images/' . $fileName, $widthIMG, $heightIMG);

                    

                    $data['img'] = $fileName;
                }

        }


        if( $request->from == 'dashboard' ){


            

                if ( Auth::check() )
            {
                $data['user_id'] = Auth::id();

                $data['status'] = $request->status;

                




                // The user is logged in...
                $build->create( $data );
                flash('تهانينا تم التسجيل بنجاح', 'success');


                return redirect('buildings');
            }else{
                return redirect('/');
            }

        }else if( $request->from == 'website' ){

            // The user is logged in...

            if( Auth::check() ){
                $data['user_id'] = Auth::id();
            }

            $data['status'] = 0;

            $build->create( $data );
            flash('تهانينا تم التسجيل بنجاح', 'success');

            return redirect('buildings');

        }else{

            return redirect('home');

        }

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Building $b1)
    {
        //

        $b4 = $b1->findOrFail( $id );

        $b1 = new Building;

        $same = $b1->where('price','>=' , $b4->price - 30000 );

        $same = $b1->where('price','<=' , $b4->price + 30000 );

        $same =  $b1->where('rent', $b4->rent );

        $same =  $b1->where('roomNumber', '>=', $b4->roomNumber - 4 );

        $same =  $b1->where('roomNumber', '<=', $b4->roomNumber + 4 );

        $same =  $b1->where('square', '>=', ( $b4->square > 1000 ? $b4->square - 1000 : $b4->square + 100 ) );

        $same =  $b1->where('square', '<=', ( $b4->square > 1000 ? $b4->square + 1000 : $b4->square + 100 ) );

        $same =  $b1->where('type', $b4->type );

        $same =  $b1->where('codePostalMaroc', $b4->codePostalMaroc );

        $same =  $b1->where('lang', '>=', $b4->lang - 5 );

        $same =  $b1->where('lang', '<=', $b4->lang  + 5 );

        $same =  $b1->where('lat', '>=', $b4->lat - 5 );

        $same =  $b1->where('lat', '<=', $b4->lat  + 5 );

        $same =  $b1->where('status', 1)->orderBy('id', 'desc')

                    ->limit(30)->offset(30)

                    ->paginate(3)

                    ;

/*


        

*/


        return view('website.buildings.single', compact('b4', 'same'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id , Building $b)
    {
        $b = $b->findOrFail( $id );
        
        return view('admin.building.edit', compact('b'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , Building $b2 , $id)
    {

        $buildingToUpdate = $b2->findOrFail( $id );

        if ( Auth::check() )
        {


            $data = [
                'name' => $request->name,
                'price' => $request->price, 
                'rent' => $request->rent, 
                'square' => $request->square, 
                'type'  => $request->type,
                'roomNumber'  => $request->roomNumber,
                'smallDisc' => $request->smallDisc,
                'largDisc' => $request->largDisc, 
                'tags' => $request->tags,
                'lang' => $request->lang, 
                'lat'=> $request->lat,
                'codePostalMaroc'=> $request->codePostalMaroc
            
            ];






        if($request->from == 'dashboard' && Auth::check() 
            ||
             $request->from == 'website' && $buildingToUpdate->status == 0 && Auth::id() == $buildingToUpdate->user_id ){





            if( $request->hasFile( 'img' ) ){

                    // get the img totally name

                    $imgName = $request->file( 'img' )->getClientOriginalName();

                        // if it is a new img requested not repeated

                        $tempSearchLastImgName = $b2->where('id', $id )->first();


                        if( $imgName != $tempSearchLastImgName ){

                            //dd("difference");

                            // search in all building for the new img

                            $tempSearchBuil = $b2->where('img', $imgName )->where( 'id' ,'!=', $id )->get();

                            // if there is in buildings the same img just fill the value

                            if( count( $tempSearchBuil ) == 0 ){

                            //if the img requested not in the buildings

                                // search again in the building if there is img with the last img value

                                $tempSearchBuil2 = $b2->where('img', $tempSearchLastImgName )->get();

                                // if there is not and its exist just deleted

                                if( count( $tempSearchBuil2 ) == 0 ){

                                    if( file_exists( base_path().'/public/images/'.$tempSearchLastImgName ) ){

                                        File::delete( base_path().'/public/images/' . $tempSearchLastImgName );

                                    }

                                }

                                $tempSearchBuil2 = null;

                                // if the file dont exist save it and save the value

                                if(!file_exists( base_path().'/public/images/'.$imgName )){

                                    $request->file( 'img' )->move( 
                                              base_path().'/public/images/', $imgName
                                          );
                                }

                            }
                            

                            $data['img'] = $imgName;


                            
                            


                        }

                        $tempSearchLastImgName = null;

                }

            }

        if( $request->from == 'dashboard' ){




            $data['status'] = $request->status;

            $b2::where('id', $id )->update( $data );

            flash('تهانينا تم التحديث بنجاح', 'success');

            return redirect('buildings');

        }



        if( $request->from == 'website' && $buildingToUpdate->status == 0 && Auth::id() == $buildingToUpdate->user_id ){

            


            $data['status'] = $request->status;

            $b2::where('id', $id )->update( $data );

            flash('تهانينا تم التحديث بنجاح', 'success');



            return redirect()->route('buildings.show', $id );

        }

        return redirect('/');

            
        }else{
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Building $b3)
    {
        //
        $b3 = $b3::find( $id );

        $b3->delete();

        flash('تهانينا تم الحذف بنجاح', 'success');

        return redirect('buildings');

    }






    public function anyData(Building $buildings)
    {

      $buildings = $buildings->all();

        return Datatables::of($buildings)


        
        ->editColumn('status', function ($model) {
                return buildingStatu( $model->status ) ;
            })


        ->editColumn('type', function ($model) {
                
                return buildingType( $model->type ) ;
            })

        ->editColumn('rent', function ($model) {
                
                return buildingRent( $model->rent ) ;
            })
        ->editColumn('codePostalMaroc', function ($model) {
                
                return buildingPlace( $model->codePostalMaroc ) ;
            })



        ->editColumn('edit', function ($model) {

                return link_to_route('buildings.edit', 'تحديث العضو', [ $model->id ], ['class' => 'btn btn-info btn-circle']);


                        
            })
        

        ->editColumn('delete', function ($model) {

                    
                return link_to_action('BuildingController@destroy', 'حذف العضو', $model->id, ['class' => 'btn btn-danger btn-circle']);
/*

                $deleting = Form::open( ['method' => 'DELETE',
                        'class' => 'delete-form',
                        'route'   => ['buildings.destroy', $model->id]
                        ])

                        . Form::submit('حذف العضو', ['class' => 'btn btn-danger btn-circle'])
                        . Form::close();

                return $deleting;

                */
                        
            })

        ->make(true);

    }

    public function showingAllEnabled(Building $b4)
    {
        //

        $b4 = $b4->where('status', 1)->orderBy('price', 'asc')->paginate(40);

        return view('website.buildings.all', compact( 'b4' ));

    }

    public function search(Request $req, Building $bs )
    {
            $b4 = $bs;

            $breadCrumb = [];


        if( $req->priceFrom != null ){

            $b4 = $b4->where('price','>=' , $req->priceFrom );

            $breadCrumb['الثمن إبتداءا من '] = $req->priceFrom ;
        }

        if( $req->priceTo != null ){

            $b4 = $b4->where('price','<=' , $req->priceTo );

            $breadCrumb['الثمن أقل من '] = $req->priceTo ;
        }

        if( $req->rent != null ){

            $b4 =  $b4->where('rent', $req->rent );

            $breadCrumb['نوع العقار '] = buildingRent( $req->rent ) ;
        }

        if( $req->roomNumberFrom  != null ){

            $b4 =  $b4->where('roomNumber', '>=', $req->roomNumberFrom );

            $breadCrumb['عدد الغرف من '] = $req->roomNumberFrom ;
        }

        if( $req->roomNumberTo != null ){

            $b4 =  $b4->where('roomNumber', '<=', $req->roomNumberTo );

            $breadCrumb['عدد الغرف أقل من '] = $req->roomNumberTo ;
        }

        if( $req->squareFrom != null  ){

            $b4 =  $b4->where('square', '>=', $req->squareFrom );

            $breadCrumb['المساحة من '] = $req->squareFrom ;

        }

        if( $req->squareTo != null ){

            $b4 =  $b4->where('square', '<=', $req->squareTo );

            $breadCrumb['المساحة أقل من '] = $req->squareTo ;

        }

        if( $req->type != null ){

            $b4 =  $b4->where('type', $req->type );

            $breadCrumb['نوع الخدمة '] = buildingType( $req->type ) ;

        }

        if( $req->codePostalMaroc != null ){

            $b4 =  $b4->where('type', $req->codePostalMaroc );

            $breadCrumb['مكان العقار '] = buildingPlace( $req->codePostalMaroc ) ;

        }

        if( $req->langFrom != null ){

            $b4 =  $b4->where('lang', '>=', $req->langFrom );

            $breadCrumb['خط الطول تواجد العقار من '] =  $req->langFrom  ;

        }

        if( $req->langTo != null ){

            $b4 =  $b4->where('lang', '<=', $req->langTo );

            $breadCrumb['خط الطول تواجد العقار أقل من '] =  $req->langTo  ;

        }

        if( $req->latFrom != null  ){

            $b4 =  $b4->where('lat', '>=', $req->latFrom );

            $breadCrumb['خط العرض تواجد العقار من '] =  $req->latFrom  ;

        }

        if( $req->latTo != null  ){

            $b4 =  $b4->where('lat', '<=', $req->latTo );

            $breadCrumb['خط العرض تواجد العقار أقل من '] =  $req->latTo  ;

        }


        $b4 =  $b4->where('status', 1)->orderBy('id', 'desc')
                ->paginate(20);

        

        return view('website.buildings.all', compact( 'b4' , 'breadCrumb'));

        

    }


    public function getJSON( Request $request, Building $bls, $id ){

        return $bls->find( $request->id )->toJson();

    }








}
