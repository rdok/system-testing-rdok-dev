pipeline {
    agent { label "linux" }
    environment {
        APP_UID = sh(script: "id -u | tr -d '\n'", returnStdout: true)
        APP_GID = sh(script: "id -g | tr -d '\n'", returnStdout: true)
        AUTHOR_EMAIL = """${sh(
            returnStdout: true,
            script: 'git show -s --format="%ae" HEAD | sed "s/^ *//;s/ *$//"'
        )}"""
    }
    stages {
        stage('build') { steps { sh 'docker-compose build --pull' } }
        stage('test') {
            steps {
                sh 'docker-compose run --rm workbench ./vendor/bin/codecept  run codequests_rdok_dev --no-colors '
                sh 'docker-compose run --rm workbench ./vendor/bin/codecept run rdok_dev --no-colors '
                sh 'docker-compose run --rm workbench ./vendor/bin/codecept run jenkins_rdok_dev --no-colors '
            }
        }
        stage('cleanup') { steps { sh 'docker-compose down' } }
    }

    post {                                                                      
        failure {                                                               
            slackSend color: '#FF0000',                                         
                message: "@here Failed: <${env.BUILD_URL}console | ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}>"
        }                                                                       
        fixed {                                                                 
            slackSend color: 'good',                                            
                message: "@here Fixed: <${env.BUILD_URL}console | ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}>"
        }                                                                       
        success {                                                               
            slackSend message: "Stable: <${env.BUILD_URL}console | ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}>" 
        }                                                                       
    } 
        
}
