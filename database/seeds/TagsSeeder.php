<?php

use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$wholeFile = "";
		$fh = fopen('./database/seeds/mostCommonTags.txt','r');
		while ($line = fgets($fh)) {
		  // <... Do your work with the line ...>
		  $wholeFile.=$line;
		  break;
		}
		fclose($fh);
		//dd($wholeFile);

		$eachTag = explode(" ... ", $wholeFile);

		$stack = array();

		foreach ($eachTag as $cardinalNumber => $tag) {
			$tagArray = array("name" => $tag);
			array_push($stack, $tagArray);
		}




        		//dd($stack);
        DB::table('tags')->insert($stack);
    }
}
