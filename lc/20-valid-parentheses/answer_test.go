package main

import (
  "testing"
)

type validTest = struct {
  argument string; expected bool
}

var validTests = []validTest{
  validTest{"{[()]}", true},
  validTest{"[({})]", true},
  validTest{"[[[[()]]])", false},
  validTest{"[{9()}]", true},
  validTest{"(([[[]]]{}))", true},
  validTest{"]", false},
}

// Run from command line with: go test .
func TestIsValid(t *testing.T) {
  for _, test := range validTests {
    output := IsValid(test.argument)
    if output != test.expected {
      t.Errorf(
        "Expected %t but actually got %t for test %s",
        test.expected,
        output,
        test.argument,
      )
    }
  }
}