

from db_models.utilities  import *
from flask import Flask

app = Flask(__name__)
""" key  """
app.config['SECRET_KEY'] = 'bks'

def allow_cross_origin (reply):
    from flask import Response
    response = Response(reply)
    response.headers["Access-Control-Allow-Origin"] = "*" # allow all domains...
    return response

def create_image_files_upload_folders ():
	import os
	if not os.path.exists(JERSEY_UPLOAD_FOLDER): os.makedirs('static/pics/jersey')
	if not os.path.exists(TSHIRTS_UPLOAD_FOLDER): os.makedirs('static/pics/tshirts') 
	if not os.path.exists(BIRTHDAY_UPLOAD_FOLDER): os.makedirs('static/pics/birthday') 
	if not os.path.exists(UNIFORMS_UPLOAD_FOLDER): os.makedirs('static/pics/uniforms')	
	if not os.path.exists(INTERIOR_UPLOAD_FOLDER): os.makedirs('static/pics/interior')
	if not os.path.exists(EXTERIOR_UPLOAD_FOLDER): os.makedirs('static/pics/exterior')


""" Image file uploads dir """
JERSEY_UPLOAD_FOLDER = 'static/pics/jersey'
TSHIRTS_UPLOAD_FOLDER = 'static/pics/tshirts' 
BIRTHDAY_UPLOAD_FOLDER = 'static/pics/birthday' 
UNIFORMS_UPLOAD_FOLDER = 'static/pics/uniforms'	
INTERIOR_UPLOAD_FOLDER = 'static/pics/interior'
EXTERIOR_UPLOAD_FOLDER = 'static/pics/exterior'

create_image_files_upload_folders ()

app.config['JERSEY_UPLOAD_FOLDER'] = JERSEY_UPLOAD_FOLDER
app.config['TSHIRTS_UPLOAD_FOLDER'] = TSHIRTS_UPLOAD_FOLDER
app.config['BIRTHDAY_UPLOAD_FOLDER'] = BIRTHDAY_UPLOAD_FOLDER
app.config['UNIFORMS_UPLOAD_FOLDER'] = UNIFORMS_UPLOAD_FOLDER	
app.config['INTERIOR_UPLOAD_FOLDER'] = INTERIOR_UPLOAD_FOLDER 
app.config['EXTERIOR_UPLOAD_FOLDER'] = EXTERIOR_UPLOAD_FOLDER

ALLOWED_EXTENSIONS = {"png","jpg","jpeg"}

def allowed_file (filename): return '.' in filename and filename.rsplit('.', 1)[1].lower() in ALLOWED_EXTENSIONS

tablenamesdictionary = {
							"JERSEY":JERSEY_TABLE,
							"TSHIRTS":TSHIRTS_TABLE,
							"BIRTHDAY":BIRTHDAY_TABLE,
							"INTERIOR":INTERIOR_TABLE,
							"UNIFORMS":UNIFORMS_TABLE,
							"EXTERIOR":EXTERIOR_TABLE,
						}


folderuploadsdictionary = {
							"JERSEY":"JERSEY_UPLOAD_FOLDER",
							"TSHIRTS":"TSHIRTS_UPLOAD_FOLDER",
							"BIRTHDAY":"BIRTHDAY_UPLOAD_FOLDER",
							"UNIFORMS":"UNIFORMS_UPLOAD_FOLDER",
							"INTERIOR":"INTERIOR_UPLOAD_FOLDER",
							"EXTERIOR":"EXTERIOR_UPLOAD_FOLDER",
						}


"""
	rendertemplates,,, updateitems,,, delete .....
"""
stored_image_folder_path_dic = {
							"JERSEY":JERSEY_UPLOAD_FOLDER,
							"TSHIRTS":TSHIRTS_UPLOAD_FOLDER,
							"BIRTHDAY":BIRTHDAY_UPLOAD_FOLDER,
							"UNIFORMS":UNIFORMS_UPLOAD_FOLDER,
							"INTERIOR":INTERIOR_UPLOAD_FOLDER,
							"EXTERIOR":EXTERIOR_UPLOAD_FOLDER,
						}


"""
	renderitems .....
"""
templatesdictionary =  {
							"JERSEY":"jersey.html",
							"TSHIRTS":"tshirts.html",
							"BIRTHDAY":"birthday.html",
							"UNIFORMS":"uniforms.html",
							"INTERIOR":"interior.html",
							"EXTERIOR":"exterior.html",
						}
