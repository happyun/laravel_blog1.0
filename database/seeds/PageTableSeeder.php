<?php  
use Illuminate\Database\Seeder;
use App\Page;

class PageTableSeeder extends Seeder{
	public function run(){
		DB::table('pages')->delete();
		for($i=0;$i<10;$i++){
			Page::create([
				'titile' => 'Titile'.$i,
				'slug'  =>  'first-page',
				'body'  =>  'Body '.$i,
				'user_id'=>  1,
				]);
		}
	}
}







?>