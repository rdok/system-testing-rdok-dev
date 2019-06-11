pipeline {
    agent any
    environment {
        APP_UID = """${sh(returnStdout: true,script: 'id -u')}"""
        APP_GID = """${sh(returnStdout: true,script: 'id -g')}"""
        AUTHOR_EMAIL = """${sh(
            returnStdout: true,
            script: 'git show -s --format="%ae" HEAD | sed "s/^ *//;s/ *$//"'
        )}"""
    }
    stages {
        stage('build') {
            steps {
                sh 'docker-compose build'
            }
        }
        stage('test') {
            steps {
                sh 'docker-compose run workbench ./vendor/bin/codecept  run codequests_rdok_dev --no-colors '
                sh 'docker-compose run workbench ./vendor/bin/codecept run rdok_dev --no-colors '
                sh 'docker-compose run workbench ./vendor/bin/codecept run jenkins_rdok_dev --no-colors '
            }
        }
        stage('cleanup') {
            steps {
                sh 'docker system prune -f'
            }
        }
    }
    post {
        failure {
            mail (
                to: "${AUTHOR_EMAIL}",
                subject: "❌ ${BUILD_TAG} - Failure",
                body: "Job Url: ${env.JOB_URL}"
            )
        }
        success {
            mail (
                to: "${AUTHOR_EMAIL}",
                subject: "✔️ ${BUILD_TAG} - Stable",
                body: "Job Url: ${env.JOB_URL}"
            )
        }
    }
}