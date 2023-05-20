
"""
	systemctl restart rc-local
	ufw default allow incoming
"""

from scripts.write_to_db import *
from scripts.read_from_db import *

if __name__=="__main__":
	app.debug=1
	# app.run(port=4040)
	app.run('0.0.0.0', 4040, threaded=1)

