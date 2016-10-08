require('../helpers/chai.js');
var Calculator = require('../../lib/calculator');
describe('When adding one and two using the calculator', function () {
    var calculator;
    before(function () {
        calculator = new Calculator();
    });
    it('should result in three using the return style approach', function () {
        var result = calculator.add(1, 2);
        expect(result).equal(3);
    });
});

/*
We describe the test case, then we create a new calculator before we specify our assertion.
In this example we used the expect style of chai.
*/