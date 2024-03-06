import speech_recognition as sr
import pyttsx3
r = sr.Recognizer()

with sr.Microphone() as source:
    print("speak Now")
    audio = r.listen(source)
    speech_text = r.recognize_google(audio)
    print(speech_text)