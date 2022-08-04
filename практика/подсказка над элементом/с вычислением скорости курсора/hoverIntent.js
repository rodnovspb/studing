'use strict';

class HoverIntent {

	constructor({
		sensitivity = 0.1,
		interval = 100,
		elem,
		over,
		out
}) {
		this.sensitivity = sensitivity;
		this.interval = interval;
		this.elem = elem;
		this.over = over;
		this.out = out;

		this.onMouseMove = this.onMouseMove.bind(this);
		this.onMouseOver = this.onMouseOver.bind(this);
		this.onMouseOut = this.onMouseOut.bind(this);

		this.trackSpeed = this.trackSpeed.bind(this);

		elem.add
	}

}