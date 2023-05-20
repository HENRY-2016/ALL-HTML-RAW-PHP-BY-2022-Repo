

from flask import render_template
from flask import request
import os, json
from configfile import *

db_connection = create_engine('sqlite:///data_bases/utilities.db')

@app.route('/rendertemplates_endpoint/<requestitemtype>',methods=['POST','GET'])
def rendertemplates (requestitemtype):
	DBsession = sessionmaker(bind=db_connection)
	session_query = DBsession()

	img_folder = stored_image_folder_path_dic[requestitemtype]
	image_names = os.listdir(img_folder)
	tablename_to_query = tablenamesdictionary[requestitemtype]
	sql_cmd = session_query.query(tablename_to_query).all ()

	name_price_and_decription = []
	for item in sql_cmd: name_price_and_decription.insert(0,(item.NAME,item.PRICE,item.DESCRIPTION))
	templates_to_render = templatesdictionary[requestitemtype]
	return allow_cross_origin(render_template(templates_to_render, name_price_and_decription=name_price_and_decription))


@app.route('/veiwitems_edit_endpoint',methods=['POST','GET'])
def viewitems ():
	DBsession = sessionmaker(bind=db_connection)
	session_query = DBsession()
	data = []
	if request.method == 'POST':
		itemtype = request.form['itemtype']
		itemtype_upper = itemtype.upper()
		tablename = tablenamesdictionary[itemtype_upper]
		sql_cmd = session_query.query(tablename).all()
		for re in sql_cmd: data.insert(0,(re.key, re.NAME)) 
		return allow_cross_origin(json.JSONEncoder().encode(data))

@app.route('/veiwitems_key_item_endpoint',methods=['POST','GET'])
def viewitems_key_details ():
	DBsession = sessionmaker(bind=db_connection)
	session_query = DBsession()
	data = []
	if request.method == 'POST':
		itemtype = request.form['itemtype']
		itemtype = request.form['key']
		tablename = tablenamesdictionary[itemtype_upper]
		sql_cmd = session_query.query(tablename).all()
		for re in sql_cmd: data.insert(0,(re.key, re.NAME)) 
		return allow_cross_origin(json.JSONEncoder().encode(data))
