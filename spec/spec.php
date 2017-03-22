<?php

  describe("WireJson", function(){

    $test = new \ProcessWire\WireJson();

    it("imports simple JSON", function(){

      $json1 = '{"name":"Barry", "surname":"Goodman", "years": [1960, 1964, 1968]}';
      $test->fromJson($json1);

      expect($test->name)->toBe('Barry');
      expect($test->surname)->toBe('Goodman');
      expect($test->years)->toBe([1960, 1964, 1968]);

    });

  });