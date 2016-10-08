require('../helpers/chai.js');
var Calculator = require('../../lib/calculator');
describe('When substracting six and eight using the calculator', function () {
    var calculator;
    before(function () {
        calculator = new Calculator();
    });
    it('should result in minus two the callback approach', function (done) {
        calculator.substract(6, 8, function(result) {
            assert.equal(result, -2);
            done();
        });
    });
});

/*
I will use the callback approach in my test since it is delaying the result by 1 second.
In the above test I also used a different assertion style, “assert”, to make my assertion.
Also notice the “done” callback parameter. 
This parameter is used to tell Mocha the test has completed.
*/