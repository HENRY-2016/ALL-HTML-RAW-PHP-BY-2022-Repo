
from db_headers import *

# declaring a Mapper 
Base = declarative_base()

class JERSEY_TABLE (Base):
	__tablename__ = 'jersey'
	key = Column ('key', Integer, primary_key = True, autoincrement = True)
	NAME = Column('NAME',String(120))
	INTPRICE = Column('INTPRICE',String(100))
	PRICE = Column('PRICE',String(100))
	DESCRIPTION = Column('DESCRIPTION',String(200))

	def __init__(self, NAME,INTPRICE,PRICE,DESCRIPTION):
		self.NAME = NAME 
		self.INTPRICE = INTPRICE 
		self.PRICE =PRICE 
		self.DESCRIPTION = DESCRIPTION
	def __str__():
		return "<JERSEY_TABLE(NAME='%s',INTPRICE='%s',PRICE='%s',DESCRIPTION='%s')>"%(self.NAME)


class TSHIRTS_TABLE (Base):
	__tablename__ = 'tshirts'
	key = Column ('key', Integer, primary_key = True, autoincrement = True)
	NAME = Column('NAME',String(120))
	INTPRICE = Column('INTPRICE',String(100))
	PRICE = Column('PRICE',String(100))
	DESCRIPTION = Column('DESCRIPTION',String(200))

	def __init__(self, NAME,INTPRICE,PRICE,DESCRIPTION):
		self.NAME = NAME 
		self.INTPRICE = INTPRICE 
		self.PRICE =PRICE 
		self.DESCRIPTION = DESCRIPTION
	def __str__():
		return "<TSHIRTS_TABLE(NAME='%s',INTPRICE='%s',PRICE='%s',DESCRIPTION='%s')>"%(self.NAME,self.INTPRICE,self.PRICE,self.DESCRIPTION)

class BIRTHDAY_TABLE (Base):
	__tablename__ = 'birthday'
	key = Column ('key', Integer, primary_key = True, autoincrement = True)
	NAME = Column('NAME',String(120))
	INTPRICE = Column('INTPRICE',String(100))
	PRICE = Column('PRICE',String(100))
	DESCRIPTION = Column('DESCRIPTION',String(200))

	def __init__(self, NAME,INTPRICE,PRICE,DESCRIPTION):
		self.NAME = NAME 
		self.INTPRICE = INTPRICE 
		self.PRICE =PRICE 
		self.DESCRIPTION = DESCRIPTION
	def __str__():
		return "<BIRTHDAY_TABLE(NAME='%s',INTPRICE='%s',PRICE='%s',DESCRIPTION='%s')>"%(self.NAME,self.INTPRICE,self.PRICE,self.DESCRIPTION)

class INTERIOR_TABLE (Base):
	__tablename__ = 'interior'
	key = Column ('key', Integer, primary_key = True, autoincrement = True)
	NAME = Column('NAME',String(120))
	INTPRICE = Column('INTPRICE',String(100))
	PRICE = Column('PRICE',String(100))
	DESCRIPTION = Column('DESCRIPTION',String(200))

	def __init__(self, NAME,INTPRICE,PRICE,DESCRIPTION):
		self.NAME = NAME 
		self.INTPRICE = INTPRICE 
		self.PRICE =PRICE 
		self.DESCRIPTION = DESCRIPTION
	def __str__():
		return "<INTERIOR_TABLE(NAME='%s',INTPRICE='%s',PRICE='%s',DESCRIPTION='%s')>"%(self.NAME,self.INTPRICE,self.PRICE,self.DESCRIPTION)

class UNIFORMS_TABLE (Base):
	__tablename__ = 'uniforms'
	key = Column ('key', Integer, primary_key = True, autoincrement = True)
	NAME = Column('NAME',String(120))
	INTPRICE = Column('INTPRICE',String(100))
	PRICE = Column('PRICE',String(100))
	DESCRIPTION = Column('DESCRIPTION',String(200))

	def __init__(self, NAME,INTPRICE,PRICE,DESCRIPTION):
		self.NAME = NAME 
		self.INTPRICE = INTPRICE 
		self.PRICE =PRICE 
		self.DESCRIPTION = DESCRIPTION
	def __str__():
		return "<UNIFORMS_TABLE(NAME= '%s',INTPRICE='%s',PRICE='%s',DESCRIPTION='%s')>"%(self.NAME,self.INTPRICE,self.PRICE,self.DESCRIPTION)

class EXTERIOR_TABLE (Base):
	__tablename__ = 'exterior'
	key = Column ('key', Integer, primary_key = True, autoincrement = True)
	NAME = Column('NAME',String(120))
	INTPRICE = Column('INTPRICE',String(100))
	PRICE = Column('PRICE',String(100))
	DESCRIPTION = Column('DESCRIPTION',String(200))

	def __init__(self, NAME,INTPRICE,PRICE,DESCRIPTION):
		self.NAME = NAME 
		self.INTPRICE = INTPRICE 
		self.PRICE =PRICE 
		self.DESCRIPTION = DESCRIPTION
	def __str__():
		return "<EXTERIOR_TABLE(NAME='%s',INTPRICE='%s',PRICE='%s',DESCRIPTION='%s')>"%(self.NAME,self.INTPRICE,self.PRICE,self.DESCRIPTION)

#  connect db
db_connection = create_engine('sqlite:///data_bases/utilities.db')
if not db_connection:
	print("\t \t ERROR :: No connection To Utilities Database")
else:
	print("\t \t SUCCESS :: Utilities Database Connected Well ")

# save tables
Base.metadata.create_all(db_connection)
