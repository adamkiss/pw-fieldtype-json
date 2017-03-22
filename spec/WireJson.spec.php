<?php
  require_once dirname(__FILE__) . '/../vendor/autoload.php';
  require_once dirname(__FILE__) . '/../WireJson.php';

  describe("WireJson", function(){


    describe("-> fromJson", function(){
      it("imports simple JSON", function(){

        $test = new \ProcessWire\WireJson();
        $json1 = '{"name":"Barry", "surname":"Goodman", "years": [1960, 1964, 1968]}';

        $test->fromJson($json1);

        expect($test->name)->toBe('Barry');
        expect($test->surname)->toBe('Goodman');
        expect($test->years)->toBe([1960, 1964, 1968]);

      });
    });

  });