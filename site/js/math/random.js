// Closure
(function(){

	/**
	 * Random floating point number between `min` and `max`.
	 *
	 * @param {number} min - min number
	 * @param {number} max - max number
	 * @return {float} a random floating point number
	 */
	function getRandomFloat(min, max) {
		return ((Math.random() * (max - min)) + min);
	}

	/**
	 * Random integer between `min` and `max`.
	 * 
	 * @param {number} min - min number
	 * @param {number} max - max number
	 * @return {int} a random integer
	 */
	function getRandomInt(min, max) {
		return Math.floor((Math.random() * (max - min + 1)) + min);
	}
	
	// Random Float
	if (!Math.randomf) {
		Math.randomf = getRandomFloat;
	}
	// Random Int
	if (!Math.randomi) {
		Math.randomi = getRandomInt;
	}

})();