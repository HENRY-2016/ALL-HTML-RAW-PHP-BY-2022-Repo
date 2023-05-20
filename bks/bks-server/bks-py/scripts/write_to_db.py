
from configfile import *
from flask import request
from werkzeug.utils import secure_filename
import os
from feedbacks import *

db_connection = create_engine('sqlite:///data_bases/utilities.db')


"""
		@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
		@
		@		CREATING ITEMS ......
		@
		@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

"""

@app.route('/creatitems_createitems',methods=['POST'])
def createitems ():
	DBsession = sessionmaker(bind=db_connection)
	session_query = DBsession()
	if  request.method == 'POST':
		item_selected_type = request.form['type'].strip()
		name = request.form['name'].strip().lower()
		# intprice = request.form['price']
		# description=request.form['description'].strip().lower()
		password = request.form['password']

		# formated_price = format(int(intprice),",")
		itemnametype = item_selected_type.upper() #convert to capital
		
		if (password == adminpassword):
			# get table from ... tablenamesdictionary[itemnametype]
			tablename = tablenamesdictionary[itemnametype]
			# if not tablename:
			if tablename == None:
				return erroropenbody + br +opencenter +sbr + TABLENAMEERROR + BACKBTN+closecenter + closebody
			else:
				# check if name is present
				exists_query = session_query.query(tablename.NAME).filter_by(NAME=name).first()
				name_exists = str() 
				if exists_query == None: pass
				else: name_exists = ''.join(exists_query)

				# check with given name
				if  name_exists == name:
					return erroropenbody + br +opencenter +sbr + EXISTSERORR + BACKBTN+closecenter + closebody
				else:
					item = tablename(name,"intprice","formated_price","description")
					session_query.add(item)
					session_query.commit()

					""" working on image """
					file = request.files['file']
					if file and allowed_file(file.filename):
						filename = secure_filename(file.filename)
						uploadfolder = folderuploadsdictionary[itemnametype]
						file.save(os.path.join(app.config[uploadfolder],name))
						return successopenbody + br +opencenter + sbr + SUCCESSADMIN1+ sbr +name +sbr +SUCCESSADMIN2 + BACKBTN+closecenter + closebody
		else : return erroropenbody + br +opencenter + sbr + ERROR_ID + BACKBTN+closecenter + closebody

"""
		@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
		@
		@		DELETING ITEM ......
		@
		@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

"""

def delete_image_file (imagefolder,imagefilename):
	""" Done by removing the img path  os.remove()"""
	image_to_delete = imagefilename
	image_to_delete_file_path = imagefolder + '/'+image_to_delete

	if os.path.exists(image_to_delete_file_path): os.remove(image_to_delete_file_path)
	else: return erroropenbody + br +opencenter + sbr + IMG_PATH_ERROR + BACKBTN+closecenter + closebody


@app.route('/deleteitems_deleteitems', methods=['POST','GET'])
def deleteitems ():
	dbsession = sessionmaker(bind=db_connection)
	session_query = dbsession()
	name = []
	
	if request.method == 'POST':
		itemnametype = request.form['itemtype']
		userkey = request.form['key']
		adminpwd = request.form['password']
		itemname = itemnametype.upper()

		if (adminpwd == adminpassword):
			tablename = tablenamesdictionary[itemname]
			img_to_delete_path = stored_image_folder_path_dic[itemname]
			name_query = session_query.query(tablename.NAME).filter_by(key=userkey).first()
			imagename = ''.join(name_query)
			
			session_query.query(tablename).filter_by(key=userkey).delete()
			delete_image_file (img_to_delete_path,imagename) # function call
			session_query.commit()
			return successopenbody + br +opencenter + sbr + DELETE_SUCCESS1 + sbr+ itemname +sbr +DELETE_SUCCESS2 + BACKBTN+closecenter + closebody
		else : return erroropenbody + br +opencenter + sbr + ERROR_ID + BACKBTN+closecenter + closebody

"""
		@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
		@
		@		UPDATING ITEMS  ......
		@
		@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

"""

@app.route('/updateitems_updateitems',methods=['POST','GET'])
def updateitems ():
	DBsession = sessionmaker(bind=db_connection)
	session_query = DBsession()

	if request.method == 'POST':
		itemnametype = request.form['itemtype']
		userkey = request.form['key']
		newname = request.form['newname']
		adminpwd = request.form['password']
		itemname = itemnametype.upper()

		if (adminpwd == adminpassword):
			if (newname != ''):
				rootospath = os.getcwd() +"/" # get root dir 
				img_file_path = stored_image_folder_path_dic[itemname]
				tablename = tablenamesdictionary[itemname]
				name_query = session_query.query(tablename.NAME).filter_by(key=userkey).first()
				oldname = ''.join(name_query) # convert to a string 

				old_file_name = rootospath + img_file_path +"/"+oldname
				new_file_name = rootospath + img_file_path +"/"+newname
				
				session_query.query(tablename).filter_by(key = userkey).update({'NAME':newname})
				os.rename(old_file_name,new_file_name) # rename file....
				session_query.commit()
				return successopenbody + br +opencenter + sbr+ UPDATSSUCCESSS+ BACKBTN+closecenter + closebody
			else: return erroropenbody + br +opencenter + sbr + UPDATEMPTYNAME + BACKBTN+closecenter + closebody
		else : return erroropenbody + br +opencenter + sbr + ERROR_ID + BACKBTN+closecenter + closebody
