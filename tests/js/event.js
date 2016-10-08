require('../helpers/chai.js');
var Calculator = require('../../lib/calculator'),
    sinon = require('sinon');
describe('When multiplying nine and three using the calculator', function () {
    var calculator,
        eventEmitterStub,
        callbackSpy,
        clock;
    before(function () {
        calculator = new Calculator();
        clock = sinon.useFakeTimers();
        eventEmitterStub = sinon.stub(calculator, 'emit');
        callbackSpy = sinon.spy();
    });
    it('should emit the event before the callback', function (done) {
        calculator.multiply(9, 3, callbackSpy);
        clock.tick(1000);
        assert.equal(callbackSpy.called, true);
        assert.equal(eventEmitterStub.calledWithExactly('result', 27), true);
        assert.equal(eventEmitterStub.calledBefore(callbackSpy), true);
        done();
    });
    after(function () {
        clock.restore();
    });
});
/*
Sinon stub and spy.
To do so I’m going to test the calculator using the event approach.
In the test I want to make sure the result event is emitted before the callback is invoked.
Since the callback is invoked after one second I want to make sure my assertions are executed when all the code of my calculation has executed.

Therefore we use the Sinon fakeTimers. By doing so we are able to test if the callback is called and we are able to test if the emit method is called before the callback.
If we would have skipped the clock then the assert on the spy would fail because the code hasn’t executed yet.
Using the stub we can monitor calls to the emit method which our object inherits from the EventEmitter.
*/