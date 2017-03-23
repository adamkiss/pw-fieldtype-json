<?php
  require_once dirname(__FILE__) . '/../vendor/autoload.php';
  require_once dirname(__FILE__) . '/../WireJson.php';

  const JSON_SIMPLE = '{"name":"Barry","surname":"Goodman","years":[1960,1964,1968]}';
  const JSON_OBJECT = '{"name":"Song of Winners","author":'.JSON_SIMPLE.'}';

  describe("WireJson", function(){

    describe("-> fromJson", function(){
      it("imports simple JSON", function(){

        $test = new \ProcessWire\WireJson();
        $test->fromJson(JSON_SIMPLE);

        expect(get_class($test))->toBe('ProcessWire\\WireJson');
        expect($test->name)->toBe('Barry');
        expect($test->surname)->toBe('Goodman');
        expect($test->years)->toBe([1960, 1964, 1968]);

      });

      it("imports objects WireJSON", function(){

        $test = new \ProcessWire\WireJson();
        $test->fromJson(JSON_OBJECT);

        expect($test->name)->toBe('Song of Winners');
        expect(gettype($test->author))->toBe('object');
        $test->author = (object)[
          'years' => [1960, 1964, 1968]
        ];
        expect($test->author->years)->toBe([1960, 1964, 1968]);
      });

      it("accepts import at creation time", function(){
        $test = new \ProcessWire\WireJson(JSON_OBJECT);

        expect($test->name)->toBe('Song of Winners');
        expect(gettype($test->author))->toBe('object');
        expect($test->author->years)->toBe([1960, 1964, 1968]);
      });
    });

    describe("-> toJson", function(){
      it("exports simple JSON", function(){

        $test = new \ProcessWire\WireJson();
        $test->fromJson(JSON_SIMPLE);

        expect($test->toJson())->toBe(JSON_SIMPLE);
      });

      it("exports self", function(){

        $test = new \ProcessWire\WireJson();
        $test->fromJson(JSON_OBJECT);
        $test->author = json_decode(JSON_SIMPLE);

        expect($test->toJson())->toBe(JSON_OBJECT);
      });

      it("exports self via toString", function(){
        $test = new \ProcessWire\WireJson();
        $test->fromJson(JSON_OBJECT);
        $test->author = json_decode(JSON_SIMPLE);

        expect("conversion: {$test}")->toBe('conversion: '.JSON_OBJECT);
      });
    });

  });