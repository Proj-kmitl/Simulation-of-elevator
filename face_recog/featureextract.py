import numpy as np, cv2, dlib, pickle, os
path = 'facedata/' 
detector = dlib.get_frontal_face_detector()
sp =  dlib.shape_predictor('shape_predictor_68_face_landmarks.dat')
model = dlib.face_recognition_model_v1('dlib_face_recognition_resnet_model_v1.dat')
FACE_DESC = [] 
FACE_NAME = []
for fn in os.listdir(path):  
    img = cv2.imread(path + fn) 
    img = cv2.cvtColor(img,cv2.COLOR_BGR2RGB) 
    dets = detector(img, 1)
    for d in dets:
        shape = sp(img, d)
        face_desc = model.compute_face_descriptor(img, shape, 1)
        FACE_DESC.append(face_desc)
        print('loading...', fn)
        FACE_NAME.append(fn[:fn.index('_')]) 
print(len(FACE_DESC))
pickle.dump((FACE_DESC, FACE_NAME), open('trainset.dat', 'wb'))
